<?php

namespace Jobsoc\ServiceProvider;

use League\Container\ServiceProvider;
use Jobsoc\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Jobsoc\Entity\Student;
use Jobsoc\Repository\PlacementRepository;
use Jobsoc\Entity\Placement;

class RepositoryProvider extends ServiceProvider
{
    protected $provides = [
        StudentRepository::class,
        PlacementRepository::class,
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

        $this->getContainer()->singleton(
            PlacementRepository::class,
            function() use ($db) {
                return $db->getRepository(Placement::class);
            }
        );
    }
}
