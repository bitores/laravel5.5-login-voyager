<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'email',
        'utm_source',
        'utm_campaign',
        'referrer'
    ];
}
