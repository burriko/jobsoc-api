<?php

require 'bootstrap.php';

require 'routes.php';

$stack = new Stack\Builder();
$stack->push('Jobsoc\Middleware\JsonApi');
$stack->push('Jobsoc\Middleware\ShibbolethAuthentication');

$app = $stack->resolve($app);
Stack\run($app);
