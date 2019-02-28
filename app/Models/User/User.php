<?php

namespace App\Models\User;

use App\Http\Resources\ImageResource;
use App\Models\Education\Course;
use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'birthday',
        'role_id',
        'is_confirmed',
    ];

    protected $casts = [
        'birthday' => 'date:d.m.Y',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        $tables = $this->hasRole('teacher')
            ? ['courses_teachers', 'teacher_id']
            : ['courses_students', 'student_id'];
        return $this->belongsToMany(Course::class, $tables[0], $tables[1], 'course_id');
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        return is_array($role) ? in_array($this->role->name, $role) : $this->role->name === $role;
    }

    /**
     * @return \Illuminate\Support\Collection|string
     */
    public function getAvatarAttribute()
    {
        $avatar = 'images/no-avatar.png';
        if ($this->hasMedia('avatar')) {
            $avatar = $this->getFirstMediaUrl('avatar', 'medium');
        }
        return asset($avatar);
    }

    /**
     * Media collections
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->keepOriginalImageFormat()
                    ->fit(Manipulations::FIT_CROP, 200, 200)
                    ->width(200)
                    ->height(200);
                $this
                    ->addMediaConversion('medium')
                    ->keepOriginalImageFormat()
                    ->width(600)
                    ->height(600)
                    ->sharpen(10)
                    ->nonOptimized();
            });
    }



    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getImagesListAttribute()
    {
        return ImageResource::collection($this->getMedia('certificates'));
    }

    public static function boot()
    {
        parent::boot();

        self::addGlobalScope('ordered', function (Builder $builder) {
            return $builder->latest('id');
        });
    }
}
