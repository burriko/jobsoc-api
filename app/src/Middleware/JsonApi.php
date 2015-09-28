<?php

namespace Jobsoc\Middleware;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class JsonApi implements HttpKernelInterface
{
	/**
	 * @var HttpKernelInterface
	 */
	private $app;

	public function __construct(HttpKernelInterface $app)
	{
		$this->app = $app;
	}

	public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
	{
		$response = $this->app->handle($request, $type, $catch);
		$response->headers->add(['Content-Type' => 'application/vnd.api+json']);
		return $response;
	}
}
