<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [ 'title' ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercises';

    /**
     * BelongsTo lessons
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    /**
     * HasMany questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
