<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
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
        'course_id',
        'status',
    ];
}
