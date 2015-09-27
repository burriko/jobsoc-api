<?php

namespace Jobsoc\Action\Placements;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Jobsoc\Repository\PlacementRepository;
use Jobsoc\Presenter\PlacementPresenter;

class View
{
    public function __construct(PlacementRepository $placements, PlacementPresenter $presenter)
    {
        $this->placements = $placements;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, JsonResponse $response, array $args)
    {
        $placement = $this->placements->find($args['id']);

        $this->presenter->setEntity($placement);
        $this->presenter->parseIncludes('assignment,shifts');

        return $response->setData($this->presenter->toArray());
    }
}
