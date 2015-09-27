<?php

namespace Jobsoc\Entity;

/**
 * Placement
 */
class Placement
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $placed;

    /**
     * @var \DateTime
     */
    private $ended;

    /**
     * @var \Jobsoc\Entity\Student
     */
    private $student;

    /**
     * @var \Jobsoc\Entity\Assignment
     */
    private $assignment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $shifts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shifts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set placed
     *
     * @param \DateTime $placed
     *
     * @return Placement
     */
    public function setPlaced($placed)
    {
        $this->placed = $placed;

        return $this;
    }

    /**
     * Get placed
     *
     * @return \DateTime
     */
    public function getPlaced()
    {
        return $this->placed;
    }

    /**
     * Set ended
     *
     * @param \DateTime $ended
     *
     * @return Placement
     */
    public function setEnded($ended)
    {
        $this->ended = $ended;

        return $this;
    }

    /**
     * Get ended
     *
     * @return \DateTime
     */
    public function getEnded()
    {
        return $this->ended;
    }

    /**
     * Set student
     *
     * @param \Jobsoc\Entity\Student $student
     *
     * @return Placement
     */
    public function setStudent(\Jobsoc\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Jobsoc\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set assignment
     *
     * @param \Jobsoc\Entity\Assignment $assignment
     *
     * @return Placement
     */
    public function setAssignment(\Jobsoc\Entity\Assignment $assignment = null)
    {
        $this->assignment = $assignment;

        return $this;
    }

    /**
     * Get assignment
     *
     * @return \Jobsoc\Entity\Assignment
     */
    public function getAssignment()
    {
        return $this->assignment;
    }

    /**
     * Add shift
     *
     * @param \Jobsoc\Entity\Shift $shift
     *
     * @return Placement
     */
    public function addShift(\Jobsoc\Entity\Shift $shift)
    {
        $this->shifts[] = $shift;

        return $this;
    }

    /**
     * Remove shift
     *
     * @param \Jobsoc\Entity\Shift $shift
     */
    public function removeShift(\Jobsoc\Entity\Shift $shift)
    {
        $this->shifts->removeElement($shift);
    }

    /**
     * Get shifts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShifts()
    {
        return $this->shifts;
    }

    public function isActive()
    {
        return $this->getEnded() === null;
    }
}
