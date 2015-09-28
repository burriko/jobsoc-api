<?php

namespace Jobsoc\Middleware;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class ShibbolethAuthentication implements HttpKernelInterface
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
		if (empty($_SERVER['HTTP_SHIB_EP_EMAILADDRESS'])) {
			$error_response = [
				'status' => Response::HTTP_UNAUTHORIZED,
				'title' => 'You are not authenticated.',
			];
			return new JsonResponse(['errors' => [$error_response]], Response::HTTP_UNAUTHORIZED);
		}

		return $this->app->handle($request, $type, $catch);
	}
}
