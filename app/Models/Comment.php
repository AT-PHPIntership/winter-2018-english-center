<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'parent_id', 'content' ];
    
    protected $table = 'comments';

    /**
     * MorphTo commentable
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
