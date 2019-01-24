<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = ['whyus', 'aboutus', 'phone', 'email', 'web', 'address'];

    protected $table = 'systems';
}
