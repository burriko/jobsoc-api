<?php

namespace Jobsoc\Action\Students;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Jobsoc\Entity\Student;
use League\Fractal\Manager;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Resource\Item;
use Jobsoc\Transformer\StudentTransformer;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 *
 */
class View
{
    public function __construct(EntityManagerInterface $db, Manager $fractal)
    {
        $this->db = $db;
        $this->fractal = $fractal;
    }

    public function handle(Request $request, JsonResponse $response, array $args)
    {
        $studentRepository = $this->db->getRepository(Student::class);
        $student = $studentRepository->find($args['id']);

        $this->fractal->setSerializer(new JsonApiSerializer('http://careers.dev/jobsoc-api/public'));
        $this->fractal->parseIncludes('placements.assignment');

        $resource = new Item($student, new StudentTransformer, 'students');
        return $response->setData($this->fractal->createData($resource)->toArray());
    }
}
