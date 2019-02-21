<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goals';

    protected $fillable = ['goal'];

    /**
     * HasMany goals
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function goalables()
    {
        return $this->hasMany('App\Models\Goalable');
    }
}
