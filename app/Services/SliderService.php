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

    /**
    * Handle update slider to database
    *
    * @param \Illuminate\Http\Request $data   data
    * @param Slider                   $slider slider
    *
    * @return void
    */
    public function update($data, $slider)
    {
        $slider->update($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        Slider::create($data);
    }

    /**
     * Function destroy course
     *
     * @param Slider $slider slider
     *
     * @return App\Services\SliderService
    **/
    public function destroy($slider)
    {
        $slider->delete();
    }
}
