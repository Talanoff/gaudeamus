<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'type',
        'name',
        'value',
    ];

    public static $TYPES = [
        'social' => 'Соцальные сети',
        'phones' => 'Телефоны',
        'email' => 'E-mail',
    ];
}
