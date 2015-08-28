<?php

namespace Jobsoc\Entity;

class Placement
{
    private $id;

    private $student;

    private $assignment;

    private $placed;

    private $ended;

    public function getPlaced()
    {
        return $this->placed;
    }

    public function getAssignment()
    {
        return $this->assignment;
    }
}