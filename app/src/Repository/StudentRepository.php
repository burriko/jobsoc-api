<?php

namespace Jobsoc\Repository;

use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function findWithPlacements($id)
    {
        $query = $this->getEntityManager()->createQuery('SELECT s, p, a, sh FROM Jobsoc\Entity\Student s JOIN s.placements p JOIN p.assignment a JOIN p.shifts sh WHERE s.id = :id');
        $query->setParameter('id', $id);

        if ($result = $query->getResult()) {
            return $result[0];
        } else {
            return $result;
        }
    }
}
