<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
<<<<<<< HEAD
        'type',
        'name',
        'value',
=======
        'name',
        'value',
        'params',
        'type',
>>>>>>> origin/master
    ];

    public static $TYPES = [
        'social' => 'Соцальные сети',
<<<<<<< HEAD
        'phones' => 'Телефоны',
=======
        'phone' => 'Телефоны',
>>>>>>> origin/master
        'email' => 'E-mail',
    ];
}
