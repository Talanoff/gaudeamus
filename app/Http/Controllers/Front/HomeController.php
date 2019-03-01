<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Article\Review;
use App\Models\Common\Aspect;
use App\Models\Common\Quote;
use App\Models\Common\Slides;
use App\Models\Education\Course;
use App\Models\Page\Page;

class HomeController extends Controller
{
    public function index()
    {

        return view('app.home.index', [
            'slides' => Slides::latest()->get(),
            'reviews' => Review::latest()->take(12)->get(),
            'methods' => Page::where('id', 2)->first(),
            'courses' => Course::latest()->get(),
            'quote' => Quote::where('id', 3)->first(),
            'about' => Page::where('id', 3)->first(),
            'aspects' => Aspect::latest()->take(3)->get(),
        ]);
    }
}
