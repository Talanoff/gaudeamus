<?php

namespace App\Models\Page;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use SluggableTrait;


    protected $fillable = [
        'title',
        'description',
        'body',
        ];
}
