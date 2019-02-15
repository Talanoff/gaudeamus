<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article\Review;
use App\Models\Common\Slides;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.home.index', [
            'slides' => Slides::latest()->get(),
            'reviews' => Review::latest()->take(12)->get(),
        ]);
    }
}
