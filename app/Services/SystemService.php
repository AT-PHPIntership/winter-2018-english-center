<?php

namespace App\Services;

use App\Models\System;
use Config\define;

class SystemService
{
    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        return System::first();
    }

    /**
    * Handle update system to database
    *
    * @param \Illuminate\Http\Request $data   data
    * @param System                   $system system
    *
    * @return void
    */
    public function update($data, $system)
    {
        $system->update($data);
    }
}
