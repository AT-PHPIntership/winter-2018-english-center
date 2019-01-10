<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    protected $fillable = ['name', 'image', 'video', 'count_view', 'total_rating', 'average', 'role'];

    protected $table = 'lessions';

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

    /**
     * Has one text
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function text()
    {
        return $this->hasMany('App\Models\Text');
    }
}
