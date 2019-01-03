<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Course extends Model
{
    const VIP = 1;
    const TRIAL = 0;

    protected $fillable = [ 'title', 'parent_id', 'count_view', 'total_rating', 'average', 'flag'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * Has many courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Models\Course', 'parent_id', 'id');
    }
    
    /**
     * BelongsTo courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Course', 'parent_id', 'id');
    }
}
