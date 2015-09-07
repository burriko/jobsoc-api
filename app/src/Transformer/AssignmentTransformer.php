<?php

namespace Jobsoc\Transformer;

use Jobsoc\Entity\Assignment;
use League\Fractal\TransformerAbstract;

class AssignmentTransformer extends TransformerAbstract
{
    public function transform(Assignment $assignment)
    {
        return [
            'id'    => $assignment->getId(),
            'title' => $assignment->getTitle(),
        ];
    }
}
