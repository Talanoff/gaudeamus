<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    public static $STATUSES = [
        'processing',
        'confirmed',
        'declined',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'vacancy_id',
        'status',
    ];
}
