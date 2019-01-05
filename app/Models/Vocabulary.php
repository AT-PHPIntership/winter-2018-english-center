<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $fillable = ['content', 'sound'];

    protected $table = 'vocabularies';

    /**
     * BelongsToMany vocanularies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessions()
    {
        return $this->belongsToMany('App\Models\Lession');
    }
}
