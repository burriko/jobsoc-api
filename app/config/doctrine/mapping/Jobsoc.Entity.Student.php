<?php

$builder = new Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder($metadata);

$builder->setTable('jobsoc_students');

$builder->createField('id', 'integer')->isPrimaryKey()->generatedValue()->build();
$builder->addField('title', 'string');
$builder->addField('first_name', 'string');
$builder->addField('surname', 'string');