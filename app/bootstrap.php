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
$app->register('\Jobsoc\ServiceProvider\RepositoryProvider');
// $app->register('\App\Leave\LeaveServiceProvider');

// Register events
// $app->subscribe('LeaveWasRequested', $app[App\Leave\Event\LeaveWasRequested::class]);

// Inject JsonResponse into route handlers
$app['Symfony\Component\HttpFoundation\Response'] = function() {
    return new Symfony\Component\HttpFoundation\JsonResponse();
};
