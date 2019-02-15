<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
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
=======
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
>>>>>>> origin/master
    }
}
