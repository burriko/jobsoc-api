<?php

namespace Jobsoc\Transformer;

use Jobsoc\Entity\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
{
    public function transform(Student $student)
    {
        return [
            'id'         => $student->getId(),
            'title'      => $student->getTitle(),
            'first_name' => $student->getFirstName(),
            'surname'    => utf8_encode($student->getSurname()),
        ];
    }
}
