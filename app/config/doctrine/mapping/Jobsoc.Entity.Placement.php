<?php

$builder = new Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder($metadata);

$builder->setTable('jobsoc_placements');
$builder->setCustomRepositoryClass(Jobsoc\Repository\PlacementRepository::class);

$builder->createField('id', 'integer')->isPrimaryKey()->generatedValue()->build();
$builder->addField('placed', 'datetime');
$builder->addField('ended', 'date');

$builder->addManyToOne('student', 'Jobsoc\Entity\Student');
$builder->addManyToOne('assignment', 'Jobsoc\Entity\Assignment');
