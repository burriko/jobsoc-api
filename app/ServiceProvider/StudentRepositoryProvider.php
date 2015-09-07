<?php

namespace Jobsoc\ServiceProvider;

use League\Container\ServiceProvider;
use Jobsoc\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Jobsoc\Entity\Student;

class StudentRepositoryProvider extends ServiceProvider
{
    protected $provides = [
        StudentRepository::class
    ];

    public function register()
    {
        $db = $this->getContainer()['db'];

        $this->getContainer()->singleton(
            StudentRepository::class,
            function() use ($db) {
                return $db->getRepository(Student::class);
            }
        );
    }
}
