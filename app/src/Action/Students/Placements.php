<?php

namespace Jobsoc\Action\Students;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Jobsoc\Repository\StudentRepository;
use Jobsoc\Presenter\PlacementPresenter;

class Placements
{
    public function __construct(StudentRepository $students, PlacementPresenter $presenter)
    {
        $this->students = $students;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, JsonResponse $response, array $args)
    {
        $student = $this->students->find($args['id']);

        $this->presenter->setEntities($student->getPlacements());
        $this->presenter->parseIncludes('assignment');

        return $response->setData($this->presenter->toArray());
    }
}
