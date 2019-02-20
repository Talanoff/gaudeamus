<?php

namespace App\Models\Article;

use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
    ];
}
