<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Course extends Model
{
    use NodeTrait;
    protected $fillable = [ 'title', 'parent_id', 'count_view', 'total_rating', 'average'];

    protected $table = 'courses';

    public function children(){
        return $this->hasMany( 'App\Models\Course', 'parent_id', 'id' );
    }

    public function parent(){
        return $this->hasOne( 'App\Models\Course', 'id', 'parent_id' );
    }
}
