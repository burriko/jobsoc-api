<?php

namespace Jobsoc\Entity;

class Assignment
{
    private $id;

    private $reference;

    private $title;

    private $school;

    private $placements;

    public function getTitle()
    {
        return $this->title;
    }
}