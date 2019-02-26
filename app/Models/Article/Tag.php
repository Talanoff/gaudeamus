<?php

namespace App\Models\Article;

use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use SlugableTrait;

    protected $fillable = [
        'title',
    ];

    protected $filtrable = 'tags';


    /**
     * @return BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
