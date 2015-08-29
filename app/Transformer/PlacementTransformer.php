<?php

namespace Jobsoc\Transformer;

use Jobsoc\Entity\Placement;
use League\Fractal\TransformerAbstract;

class PlacementTransformer extends TransformerAbstract
{
    public function transform(Placement $placement)
    {
        return [
            'id'     => $placement->getId(),
            'placed' => $placement->getPlaced(),
        ];
    }
}
