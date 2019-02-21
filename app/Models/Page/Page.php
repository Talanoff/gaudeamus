<?php

namespace App\Models\Page;

use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use SlugableTrait;


    protected $fillable = [
        'title',
        'description',
        'body',
        ];
}
