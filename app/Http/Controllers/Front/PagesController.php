<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use App\Models\Education\Course;
use App\Models\Page\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function programs()
    {
        $banner = Banner::where('title' ,'Программа и стоимость')->first();
        $page = Page::where('title' ,'Программы и стоимость обучения')->first();
        $courses = Course::latest('id')->get();
        return \view('app.programs.index', compact('page', 'banner', 'courses'));
    }
}
