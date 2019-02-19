<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article\Review;
use App\Models\Common\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->paginate(6);
        $banner = Banner::where('title' ,'Отзывы')->first();

        return \view('app.reviews.index', compact('reviews', 'banner'));
    }

    public function store(Request $request)
    {
        $review = Review::create([
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'user_name' => $request->input('name'),
            'message' => $request->input('message'),
        ]);
        return \redirect()->route('app.reviews');
    }


}
