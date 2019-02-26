<?php

namespace App\Models\Education;

use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Material extends Model implements HasMedia
{
    use SlugableTrait;
    use HasMediaTrait;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'body',
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
        $media = 'images/no-image.png';

        if ($this->hasMedia('material')) {
            $media = substr($this->getFirstMediaUrl('material', 'preview'), 1);
        }

        return asset($media);
    }
}
