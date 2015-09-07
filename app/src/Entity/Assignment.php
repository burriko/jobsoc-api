<?php

namespace Jobsoc\Entity;

/**
 * Assignment
 */
class Assignment
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $school;

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
     * Set reference
     *
     * @param string $reference
     *
     * @return Assignment
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Assignment
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
     * Set school
     *
     * @param string $school
     *
     * @return Assignment
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Add placement
     *
     * @param \Jobsoc\Entity\Placement $placement
     *
     * @return Assignment
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
