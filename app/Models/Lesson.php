<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['name', 'image', 'video', 'count_view', 'total_rating', 'average', 'role', 'text'];

    protected $table = 'lessons';

    const VIP = 1;
    const TRIAL = 0;

    /**
     * BelongsTo courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    /**
     * BelongsTo levels
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    /**
     * BelongsToMany vocabularies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vocabularies()
    {
        return $this->belongsToMany('App\Models\Vocabulary');
    }
}
