<?php

namespace App\Models\Article;

use App\Models\User\User;
use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Article extends Model implements HasMedia
{
    use SlugableTrait;
    use HasMediaTrait;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'views_count',
    ];

    protected $casts = [
        'views_count' => 'integer',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAuthorNameAttribute()
    {
        return $this->author ? $this->author->name : $this->user_name;
    }

    /**
     * Store viewed articles and count up
     */
    public function handleViewed()
    {
        if (!session()->has('viewed_articles')) {
            session()->put('viewed_articles', []);
        }

        $viewed = collect(session()->get('viewed_articles'));

        if (!$viewed->contains($this->id)) {
            $viewed->prepend($this->id);
            session()->put('viewed_articles', $viewed->all());

            $this->update([
                'views_count' => $this->views_count + 1,
            ]);
        }
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('article')
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

        if ($this->hasMedia('article')) {
            $media = substr($this->getFirstMediaUrl('article', 'preview'), 1);
        }

        return asset($media);
    }
}
