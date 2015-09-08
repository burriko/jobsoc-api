<?php

$app->get('/students', 'Jobsoc\Action\Students\Index::handle');

$app->get('/students/{id}', 'Jobsoc\Action\Students\View::handle');

$app->get('/students/{id}/placements', 'Jobsoc\Action\Students\Placements::handle');
