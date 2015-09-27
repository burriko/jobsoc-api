<?php

$builder = new Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder($metadata);

$builder->setTable('jobsoc_shifts');

$builder->createField('id', 'integer')->isPrimaryKey()->generatedValue()->build();
$builder->addField('date_worked', 'date');
$builder->addField('hours', 'integer');
$builder->addField('minutes', 'integer');
$builder->createField('pay', 'decimal')->precision(10)->scale(2)->build();

$builder->addManyToOne('placement', 'Jobsoc\Entity\Placement');
