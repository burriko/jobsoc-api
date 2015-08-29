<?php

namespace Jobsoc\Entity;

/**
 * Student
 */
class Student
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $placements;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->placements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Student
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Student
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Student
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Add placement
     *
     * @param \Jobsoc\Entity\Placement $placement
     *
     * @return Student
     */
    public function addPlacement(\Jobsoc\Entity\Placement $placement)
    {
        $this->placements[] = $placement;

        return $this;
    }

    /**
     * Remove placement
     *
     * @param \Jobsoc\Entity\Placement $placement
     */
    public function removePlacement(\Jobsoc\Entity\Placement $placement)
    {
        $this->placements->removeElement($placement);
    }

    /**
     * Get placements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlacements()
    {
        return $this->placements;
    }
}

