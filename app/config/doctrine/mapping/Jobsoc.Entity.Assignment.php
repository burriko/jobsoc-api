<?php

$builder = new Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder($metadata);

$builder->setTable('jobsoc_assignments');

$builder->createField('id', 'integer')->isPrimaryKey()->generatedValue()->build();
$builder->addField('reference', 'string');
$builder->addField('title', 'string');
$builder->addField('school', 'string');

$builder->addOneToMany('placements', 'Jobsoc\Entity\Placement', 'assignment');
