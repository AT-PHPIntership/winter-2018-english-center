<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    protected $fillable = ['name', 'image', 'video', 'count_view'];

    protected $table = 'lessions';

    /**
     * BelongsTo lessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    /**
     * BelongsTo lessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    /**
     * BelongsToMany levels
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vocabularies()
    {
        return $this->belongsToMany('App\Models\Vocabulary');
    }
}
