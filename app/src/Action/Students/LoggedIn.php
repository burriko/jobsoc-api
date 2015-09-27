<?php

namespace Jobsoc\Action\Students;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Jobsoc\Presenter\StudentPresenter;
use Jobsoc\Repository\StudentRepository;

class LoggedIn
{
    public function __construct(StudentRepository $students, StudentPresenter $presenter)
    {
        $this->students = $students;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, JsonResponse $response)
    {
        $student = $this->students->findWithPlacements(226);

        $this->presenter->setEntity($student);
        $this->presenter->parseIncludes('placements.assignment,placements.shifts');

        return $response->setData($this->presenter->toArray());
    }
}
