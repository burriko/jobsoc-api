<?php

$metadata->setTableName('jobsoc_students');

$metadata->mapField([
   'id' => true,
   'fieldName' => 'id',
   'type' => 'integer'
]);

$metadata->mapField([
   'fieldName' => 'title',
   'type' => 'string',
]);

$metadata->mapField([
   'fieldName' => 'first_name',
   'type' => 'string',
]);

$metadata->mapField([
   'fieldName' => 'surname',
   'type' => 'string',
]);
