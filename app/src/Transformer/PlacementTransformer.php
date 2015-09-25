<?php

namespace Jobsoc\Transformer;

use DateTime;
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
            'placed' => $placement->getPlaced()->format(DateTime::ATOM),
            'active' => $placement->isActive(),
        ];
    }

    public function includeAssignment(Placement $placement)
    {
        return $this->item($placement->getAssignment(), new AssignmentTransformer, 'assignments');
    }
}
