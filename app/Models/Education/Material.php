<?php

namespace App\Models\Education;

use App\Traits\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    use SlugableTrait;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'course_id',
    ];

    /**
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        $this->belongsTo(Course::class);
    }
}
