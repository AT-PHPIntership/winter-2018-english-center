<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Course extends Model
{
    protected $fillable = [ 'title', 'parent_id', 'count_view', 'total_rating', 'average'];
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
     * Has many courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Course', 'parent_id', 'id');
    }
}
