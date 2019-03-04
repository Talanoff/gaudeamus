<?php

namespace App\Models\Article;


use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Review extends Model implements HasMedia
{
    use HasMediaTrait;

    public static $STATUSES = [
        'processing',
        'confirmed',
        'declined',
    ];

    protected $fillable = [
        'user_id',
        'user_name',
        'message',
        'status',
        'video_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAuthorNameAttribute()
    {
        return $this->author ? $this->author->name : $this->user_name;
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (Auth::check() && Auth::user()->hasRole('admin')) {
                $model->status = 'confirmed';
            }
        });

        if (!app('router')->currentRouteNamed('admin.*')) {
            self::addGlobalScope('confirmed', function ($builder) {
                $builder->where('status', 'confirmed');
            });
        }
    }
}
