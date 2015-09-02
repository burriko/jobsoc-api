<?php

define('APP_DIR', __DIR__);

require APP_DIR.'/../vendor/autoload.php';

$app = new Proton\Application();

// Set configs
$app->setConfig('database', include APP_DIR.'/config/database.php');

// Enable constructor injection of shared Event Emitter instance
$app->getContainer()->singleton(League\Event\Emitter::class, $app->getEventEmitter());

// Register service providers
$app->register('\Jobsoc\ServiceProvider\DoctrineProvider');
// $app->register('\App\Leave\LeaveServiceProvider');

// Register events
// $app->subscribe('LeaveWasRequested', $app[App\Leave\Event\LeaveWasRequested::class]);

$app['Symfony\Component\HttpFoundation\Response'] = function() {
    $response = new Symfony\Component\HttpFoundation\JsonResponse();
    $response->headers->add(['Content-Type' => 'application/vnd.api+json']);
    return $response;
};
