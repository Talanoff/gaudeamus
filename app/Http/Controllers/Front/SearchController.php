<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use App\Models\Education\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $courses = Course::query()->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhereHas('materials', function (Builder $builder) use ($search) {
                $builder->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('body', 'like', "%{$search}%");
            });
        return \view('app.search.index', [
            'banner' => Banner::find(9),
            'courses' => $courses->get(),

        ]);

    }
}
