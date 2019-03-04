<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Respond extends Model implements HasMedia
{
    use HasMediaTrait;

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
