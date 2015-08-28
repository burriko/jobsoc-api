<?php

namespace Jobsoc\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Student
{
    private $id;

    private $title;

    private $first_name;

    private $surname;

    private $placements;

    public function __construct()
    {
        $this->placements = new ArrayCollection();
    }

    public function getPlacements()
    {
        return $this->placements;
    }
}