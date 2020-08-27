<?php

namespace App\Models\Education;

use App\Models\User\User;
use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Course extends Model implements HasMedia, Sortable
{
    use SluggableTrait, HasMediaTrait, SortableTrait;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'lessons',
        'price',
        'starts_at',
        'ends_at',
        'order'
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public static $TYPES = [
        'basic' => 'Основной курс',
        'grammar' => 'Курс грамматики',
    ];

    /**
     * @return BelongsToMany
     */
    public function materials(): belongsToMany
    {
        return $this->belongsToMany(Material::class, 'course_material', 'course_id', 'material_id');
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

    public function getFirstMaterials()
    {
        return $this->materials()->take(4)->get();
    }

    public function getHiddenMaterials()
    {
        $ids = $this->getFirstMaterials()->pluck('id')->all();
        return $this->materials()->whereNotIn('material_id', $ids)->get();
    }

    /**
     * Media collections
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('course')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER, 100, 100)
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('preview')
                    ->crop(Manipulations::CROP_CENTER, 385, 193)
                    ->width(385)
                    ->height(193);
            });
    }

    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        $media = asset('images/no-image.png');

        if ($this->hasMedia('course')) {
            $media = $this->getFirstMedia('course')->getFullUrl('preview');
        }

        return $media;
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('global_order', function ($builder) {
            $builder->orderByDesc('created_at')->ordered();
        });
    }
}
