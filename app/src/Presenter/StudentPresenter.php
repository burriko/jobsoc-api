<?php

namespace Jobsoc\Presenter;

use League\Fractal\Manager;
use Jobsoc\Entity\Student;
use Jobsoc\Transformer\StudentTransformer;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Resource\Item;

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

    public function parseIncludes($includes)
    {
        $this->fractal->parseIncludes($includes);
    }

    public function toArray()
    {
        $resource = new Item($this->entity, new StudentTransformer, 'students');
        return $this->fractal->createData($resource)->toArray();
    }
}
