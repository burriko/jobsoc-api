<?php

namespace Jobsoc\Action\Students;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Jobsoc\Entity\Student;
use Jobsoc\Presenter\StudentPresenter;

/**
 *
 */
class View
{
    public function __construct(EntityManagerInterface $db, StudentPresenter $presenter)
    {
        $this->db = $db;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, JsonResponse $response, array $args)
    {
        $studentRepository = $this->db->getRepository(Student::class);
        $student = $studentRepository->find($args['id']);

        $this->presenter->setEntity($student);
        $this->presenter->parseIncludes('placements.assignment');

        return $response->setData($this->presenter->toArray());
    }
}
