<?php

namespace Jobsoc\Action\Students;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Jobsoc\Entity\Student;
use Jobsoc\Presenter\StudentPresenter;
use Jobsoc\Repository\StudentRepository;

class Index
{
    public function __construct(StudentRepository $students, StudentPresenter $presenter)
    {
        $this->students = $students;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, JsonResponse $response, array $args)
    {
        $students = $this->students->findAll();

        $this->presenter->setEntities($students);

        return $response->setData($this->presenter->toArray());
    }
}
