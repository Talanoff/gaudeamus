<?php

namespace App\Models\Education;

use App\Models\User\User;
use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use SlugableTrait;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'lessons',
        'price',
        'starts_at',
        'ends_at',
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    public static $TYPES = [
        'basic' => 'Основной курс',
        'grammar' => 'Курс грамматики',
    ];

    /**
     * @return HasMany
     */
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    /**
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'courses_students', 'course_id', 'student_id');
    }

    /**
     * @return BelongsToMany
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'courses_teachers', 'course_id', 'teacher_id');
    }
}
