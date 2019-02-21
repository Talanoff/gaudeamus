<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Article\Review;
use App\Models\Common\Slides;
use App\Models\Page\Page;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.home.index', [
            'slides' => Slides::latest()->get(),
            'reviews' => Review::latest()->take(12)->get(),
            'methods' => Page::where('id', 2)->first(),
        ]);
    }
}
