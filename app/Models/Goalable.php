<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goalable extends Model
{
    protected $fillable = [ 'goal_id' ];
    
    protected $table = 'goalables';

    /**
     * MorphTo commentable
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphTo
     */
    public function goalable()
    {
        return $this->morphTo();
    }

    /**
     * BelongsTo goalable
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function abc()
    {
        return $this->belongsTo('App\Models\Goal');
    }
}
