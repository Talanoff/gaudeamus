<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'value',
        'params',
        'type',
    ];

    public static $TYPES = [
        'social' => 'Соцальные сети',
        'phone' => 'Телефоны',
        'email' => 'E-mail',
    ];
}
