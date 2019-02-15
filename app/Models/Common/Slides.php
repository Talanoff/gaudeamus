<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Slides extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'title',
        'description',
        'body'
    ];

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('slides')
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

                $this->addMediaConversion('banner')
                    ->width(1920)
                    ->height(1920)
                    ->sharpen(10);
            });
    }

    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        $media = 'images/no-image.png';

        if ($this->hasMedia('slides')) {
            $media = substr($this->getFirstMediaUrl('slides', 'preview'), 1);
        }

        return asset($media);
    }

    /**
     * @return string
     */
    public function getBannerAttribute(): string
    {
        return $this->getFirstMediaUrl('slides', 'banner');
    }

}
