<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    
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

    /**
     * HasMany lessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    /**
     * BelongsToMany user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * MorphMany comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
