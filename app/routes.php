<?php

use Jobsoc\Entity\Student;
use Jobsoc\Transformer\StudentTransformer;
use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Resource\Item as FractalItem;
use League\Fractal\Serializer\JsonApiSerializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->get('/', function(Request $request, Response $response, array $args) {
    return $response->setContent('hi');
});

$app->get('/students', function(Request $request, Response $response, array $args) use ($app) {
    $studentRepository = $app['db']->getRepository(Student::class);
    $students = $studentRepository->findAll();

    $response->headers->add(['Content-Type' => 'application/json']);

    $fractal = new FractalManager();
    $fractal->setSerializer(new JsonApiSerializer());

    $resource = new FractalCollection($students, new StudentTransformer, 'students');
    return $response->setContent($fractal->createData($resource)->toJson());
});

$app->get('/students/{id}', function(Request $request, Response $response, array $args) use ($app) {
    $studentRepository = $app['db']->getRepository(Student::class);
    $student = $studentRepository->find($args['id']);

    $response->headers->add(['Content-Type' => 'application/json']);

    $fractal = new FractalManager();
    $fractal->setSerializer(new JsonApiSerializer());

    $resource = new FractalItem($student, new StudentTransformer, 'student');
    return $response->setContent($fractal->createData($resource)->toJson());
});
