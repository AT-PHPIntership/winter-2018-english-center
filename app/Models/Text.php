<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['content', 'sound'];

    protected $table = 'texts';

    /**
     * BelongsTo texts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lessions()
    {
        return $this->belongsTo('App\Models\Lession');
    }
}
