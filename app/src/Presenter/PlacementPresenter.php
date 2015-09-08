<?php

namespace Jobsoc\Presenter;

use Jobsoc\Transformer\PlacementTransformer;

class PlacementPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new PlacementTransformer();
    }

    public function getResourceName()
    {
        return 'placements';
    }
}
