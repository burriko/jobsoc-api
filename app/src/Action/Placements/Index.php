<?php

namespace Jobsoc\Action\Placements;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Jobsoc\Repository\PlacementRepository;
use Jobsoc\Presenter\PlacementPresenter;

class Index
{
    public function __construct(PlacementRepository $placements, PlacementPresenter $presenter)
    {
        $this->placements = $placements;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, JsonResponse $response, array $args)
    {
        $placements = $this->placements->findAll();

        $this->presenter->setEntities($placements);

        return $response->setData($this->presenter->toArray());
    }
}
