<?php

namespace App\Models\Article;

use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Faq extends Model implements HasMedia
{
    use SlugableTrait;
    use HasMediaTrait;

    protected $fillable = [
        'title',
        'body',
    ];
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('faq')
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

        if ($this->hasMedia('faq')) {
            $media = substr($this->getFirstMediaUrl('faq', 'preview'), 1);
        }

        return asset($media);
    }

}
