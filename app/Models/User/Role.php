<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static $ROLES = [
        'admin' => 'Администратор',
        'manager' => 'Менеджер',
        'teacher' => 'Преподователь',
        'student' => 'Студент',
    ];
}
