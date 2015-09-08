<?php

namespace Jobsoc\Presenter;

use League\Fractal\Manager;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;

abstract class FractalPresenter
{
    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
        $this->fractal->setSerializer(new JsonApiSerializer('http://careers.dev/jobsoc-api/public'));
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    public function setEntities($entities)
    {
        $this->entities = $entities;
    }

    public function parseIncludes($includes)
    {
        $this->fractal->parseIncludes($includes);
    }

    public function toArray()
    {
        return $this->fractal->createData($this->getResource())->toArray();
    }

    abstract public function getTransformer();

    abstract public function getResourceName();

    private function getResource()
    {
        if (isset($this->entity)) {
            $resource = new Item($this->entity, $this->getTransformer(), $this->getResourceName());
        } else {
            $resource = new Collection($this->entities, $this->getTransformer(), $this->getResourceName());
        }
        return $resource;
    }
}
