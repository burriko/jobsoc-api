<?php

namespace Jobsoc\Transformer;

use Jobsoc\Entity\Shift;
use League\Fractal\TransformerAbstract;

class ShiftTransformer extends TransformerAbstract
{
    public function transform(Shift $shift)
    {
        return [
            'id'          => $shift->getId(),
            'date_worked' => $shift->getDateWorked()->format(DATE_ATOM),
            'hours'       => $shift->getHours(),
            'minutes'     => $shift->getMinutes(),
            'pay'         => $shift->getPay(),
        ];
    }
}
