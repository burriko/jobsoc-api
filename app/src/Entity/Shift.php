<?php

namespace Jobsoc\Entity;

/**
 * Shift
 */
class Shift
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date_worked;

    /**
     * @var integer
     */
    private $hours;

    /**
     * @var integer
     */
    private $minutes;

    /**
     * @var string
     */
    private $pay;

    /**
     * @var \Jobsoc\Entity\Placement
     */
    private $placement;


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
     * Set dateWorked
     *
     * @param \DateTime $dateWorked
     *
     * @return Shift
     */
    public function setDateWorked($dateWorked)
    {
        $this->date_worked = $dateWorked;

        return $this;
    }

    /**
     * Get dateWorked
     *
     * @return \DateTime
     */
    public function getDateWorked()
    {
        return $this->date_worked;
    }

    /**
     * Set hours
     *
     * @param integer $hours
     *
     * @return Shift
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return integer
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set minutes
     *
     * @param integer $minutes
     *
     * @return Shift
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;

        return $this;
    }

    /**
     * Get minutes
     *
     * @return integer
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * Set pay
     *
     * @param string $pay
     *
     * @return Shift
     */
    public function setPay($pay)
    {
        $this->pay = $pay;

        return $this;
    }

    /**
     * Get pay
     *
     * @return string
     */
    public function getPay()
    {
        return $this->pay;
    }

    /**
     * Set placement
     *
     * @param \Jobsoc\Entity\Placement $placement
     *
     * @return Shift
     */
    public function setPlacement(\Jobsoc\Entity\Placement $placement = null)
    {
        $this->placement = $placement;

        return $this;
    }

    /**
     * Get placement
     *
     * @return \Jobsoc\Entity\Placement
     */
    public function getPlacement()
    {
        return $this->placement;
    }
}

