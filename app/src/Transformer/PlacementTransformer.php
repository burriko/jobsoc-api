<?php

namespace Jobsoc\Transformer;

use Jobsoc\Entity\Placement;
use League\Fractal\TransformerAbstract;
use Jobsoc\Transformer\AssignmentTransformer;

class PlacementTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'assignment',
    ];

    public function transform(Placement $placement)
    {
        return [
            'id'     => $placement->getId(),
            'placed' => $placement->getPlaced(),
        ];
    }

    public function includeAssignment(Placement $placement)
    {
        return $this->item($placement->getAssignment(), new AssignmentTransformer, 'assignments');
    }
}
