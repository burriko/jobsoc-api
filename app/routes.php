<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Jobsoc\Entity\Student;

$app->get('/', function(Request $request, Response $response, array $args) {
    return $response->setContent('hi');
});

$app->get('/students', function(Request $request, Response $response, array $args) use ($app) {
    $studentRepository = $app['db']->getRepository(Student::class);
    $students = $studentRepository->findAll();

    return $response->setContent(print_r($students, true));
});


$app->get('/students/{id}', function(Request $request, Response $response, array $args) use ($app) {
    $studentRepository = $app['db']->getRepository(Student::class);
    $student = $studentRepository->find($args['id']);

    return $response->setContent(print_r($student, true));
});


