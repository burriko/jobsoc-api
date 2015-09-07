<?php

$builder = new Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder($metadata);

$builder->setTable('jobsoc_students');
$builder->setCustomRepositoryClass(Jobsoc\Repository\StudentRepository::class);

$builder->createField('id', 'integer')->isPrimaryKey()->generatedValue()->build();
$builder->addField('title', 'string');
$builder->addField('first_name', 'string');
$builder->addField('surname', 'string');

$builder->addOneToMany('placements', 'Jobsoc\Entity\Placement', 'student');
