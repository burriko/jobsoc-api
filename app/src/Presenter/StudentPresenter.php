<?php

namespace Jobsoc\Presenter;

use Jobsoc\Transformer\StudentTransformer;

class StudentPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new StudentTransformer();
    }

    public function getResourceName()
    {
        return 'students';
    }
}
