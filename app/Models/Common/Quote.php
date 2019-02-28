<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'title',
        'quote',
        'author'
    ];
}
