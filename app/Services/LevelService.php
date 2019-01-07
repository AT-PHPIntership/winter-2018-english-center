<?php

namespace App\Services;

use App\Models\Level;

class LevelService
{
    /**
     * Function index get all level
     *
     * @return App\Services\LevelService
    **/
    public function index()
    {
        return Level::all();
    }
}
