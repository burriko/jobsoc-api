<?php

use Jobsoc\Entity\Student;
use Jobsoc\Transformer\StudentTransformer;
use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Resource\Item as FractalItem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->get('/', function(Request $request, Response $response, array $args) {
    return $response->setContent('hi');
});

$app->get('/students', function(Request $request, Response $response, array $args) use ($app) {
    $studentRepository = $app['db']->getRepository(Student::class);
    $students = $studentRepository->findAll();

    $fractal = new FractalManager();

    $resource = new FractalCollection($students, new StudentTransformer);
    return $response->setContent($fractal->createData($resource)->toJson());
});

$app->get('/students/{id}', function(Request $request, Response $response, array $args) use ($app) {
    $studentRepository = $app['db']->getRepository(Student::class);
    $student = $studentRepository->find($args['id']);

    $fractal = new FractalManager();

    $resource = new FractalItem($student, new StudentTransformer);
    return $response->setContent($fractal->createData($resource)->toJson());
});
