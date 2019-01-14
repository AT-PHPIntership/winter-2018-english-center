<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    const LEVEL_BASIC = 'Basic';
    const LEVEL_MEDIUM = 'Medium';
    const LEVEL_ADVANCED = 'Advanced';

    protected $fillable = ['level'];

    protected $table = 'm_level';
   
    /**
     * Hasmany lessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\Hasmany
     */
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
