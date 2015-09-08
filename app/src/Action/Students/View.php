<?php

namespace Jobsoc\Action\Students;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Jobsoc\Presenter\StudentPresenter;
use Jobsoc\Repository\StudentRepository;

class View
{
    public function __construct(StudentRepository $students, StudentPresenter $presenter)
    {
        $this->students = $students;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, JsonResponse $response, array $args)
    {
        $student = $this->students->find($args['id']);

        $this->presenter->setEntity($student);
        $this->presenter->parseIncludes('placements.assignment');

        return $response->setData($this->presenter->toArray());
    }
}
