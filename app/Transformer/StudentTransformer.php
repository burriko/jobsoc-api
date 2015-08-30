<?php

namespace Jobsoc\Transformer;

use Jobsoc\Entity\Placement;
use Jobsoc\Entity\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'placements',
    ];

    protected $defaultIncludes = [
        'placements'
    ];

    public function transform(Student $student)
    {
        return [
            'id'         => $student->getId(),
            'title'      => $student->getTitle(),
            'first_name' => $student->getFirstName(),
            'surname'    => utf8_encode($student->getSurname()),
        ];
    }

    public function includePlacements(Student $student)
    {
        return $this->collection($student->getPlacements(), new PlacementTransformer, 'placements');
    }
}
