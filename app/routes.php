<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Jobsoc\Entity\Student;

$app->get('/', function(Request $request, Response $response, array $args) {
    return $response->setContent('hi');
});

$app->get('/student', function(Request $request, Response $response, array $args) use ($app) {
    $studentRepository = $app['db']->getRepository(Student::class);
    $students = $studentRepository->findAll();
    var_dump($students);
    return $response->setContent(json_encode($students));
});


