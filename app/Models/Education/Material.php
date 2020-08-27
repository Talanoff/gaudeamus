<?php

namespace App\Models\Education;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Material extends Model implements HasMedia, Sortable
{
    use SluggableTrait, HasMediaTrait, SortableTrait;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'body',
        'order'
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    /**
     * @return BelongsToMany
     */
    public function course(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    /**
     * Media collections
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('material')
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

        if ($this->hasMedia('material')) {
            $media = $this->getFirstMedia('material')->getFullUrl('preview');
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
