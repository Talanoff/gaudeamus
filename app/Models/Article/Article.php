<?php

namespace App\Models\Article;

use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use SlugableTrait;

    protected $fillable = [
        'title',
        'body',
    ];
}
