<?php

namespace Jobsoc\Entity;

/**
 * @Entity @Table(name="jobsoc_students")
 **/
class Student
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $title;

    /**
     * @Column(type="string")
     */
    private $first_name;

    /**
     * @Column(type="string")
     */
    private $surname;
}