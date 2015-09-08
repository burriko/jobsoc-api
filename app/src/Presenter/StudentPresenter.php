<?php

namespace Jobsoc\Presenter;

use League\Fractal\Manager;
use Jobsoc\Entity\Student;
use Jobsoc\Transformer\StudentTransformer;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;

class StudentPresenter
{
    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
        $this->fractal->setSerializer(new JsonApiSerializer('http://careers.dev/jobsoc-api/public'));
    }

    public function setEntity(Student $student)
    {
        $this->entity = $student;
    }

    public function setEntities(array $students)
    {
        $this->entities = $students;
    }

    public function parseIncludes($includes)
    {
        $this->fractal->parseIncludes($includes);
    }

    public function toArray()
    {
        return $this->fractal->createData($this->getResource())->toArray();
    }

    private function getResource()
    {
        if (isset($this->entity)) {
            $resource = new Item($this->entity, new StudentTransformer, 'students');
        } else {
            $resource = new Collection($this->entities, new StudentTransformer, 'students');
        }
        return $resource;
    }
}
