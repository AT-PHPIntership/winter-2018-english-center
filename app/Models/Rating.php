<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['star'];
    
    protected $table = 'ratings';

    /**
     * MorphTo ratingable
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphTo
     */
    public function ratingable()
    {
        return $this->morphTo();
    }

    /**
     * BelongsTo user
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
