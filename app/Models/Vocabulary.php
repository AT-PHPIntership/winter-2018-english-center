<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $fillable = ['vocabulary', 'word_type', 'means', 'sound'];

    protected $table = 'vocabularies';

    /**
     * BelongsToMany vocanularies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessons()
    {
        return $this->belongsToMany('App\Models\Lesson');
    }
}
