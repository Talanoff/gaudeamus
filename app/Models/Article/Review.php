<?php

namespace App\Models\Article;

<<<<<<< HEAD
use App\Models\User\User;
use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
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
=======
use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use SlugableTrait;

>>>>>>> origin/master
}
