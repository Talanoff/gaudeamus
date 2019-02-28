<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use App\Models\Education\Course;
use App\Models\Page\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
        $about = Page::where('id', 3)->first();
        $banner = Banner::where('id', 10)->first();
        $courses = Course::latest()->get();

        return \view ('app.pages.about', compact('about', 'banner', 'courses'));
    }
}
