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
    public function getAll()
    {
        return System::all();
    }
}
