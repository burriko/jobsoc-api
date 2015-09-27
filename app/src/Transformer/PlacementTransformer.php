<?php

namespace Jobsoc\Transformer;

use Jobsoc\Entity\Placement;
use League\Fractal\TransformerAbstract;
use Jobsoc\Transformer\AssignmentTransformer;

class PlacementTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'assignment',
        'shifts'
    ];

    public function transform(Placement $placement)
    {
        return [
            'id'     => $placement->getId(),
            'placed' => $placement->getPlaced()->format(DATE_ATOM),
            'active' => $placement->isActive(),
        ];
    }

    public function includeAssignment(Placement $placement)
    {
        return $this->item($placement->getAssignment(), new AssignmentTransformer, 'assignments');
    }

    public function includeShifts(Placement $placement)
    {
        return $this->collection($placement->getShifts(), new ShiftTransformer, 'shifts');
    }
}
