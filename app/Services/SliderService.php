<?php

namespace App\Services;

use App\Models\Slider;

class SliderService
{
    /**
     * Function getAll get all slider
     *
     * @return App\Services\SliderService
    **/
    public function getAll()
    {
        return Slider::all();
    }
}
