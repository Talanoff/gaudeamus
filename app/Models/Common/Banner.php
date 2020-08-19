<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Banner extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'title',
    ];

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('banners')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->keepOriginalImageFormat()
                    ->crop(Manipulations::CROP_CENTER, 100, 100)
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('preview')
                    ->keepOriginalImageFormat()
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

        if ($this->hasMedia('banners')) {
            $media = $this->getFirstMedia('banner')->getFullUrl('thumb');
        }

        return $media;
    }
}
