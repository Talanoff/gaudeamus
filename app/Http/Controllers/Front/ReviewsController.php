<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article\Review;
use App\Models\Common\Banner;
use App\Models\Education\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->paginate(6);
        $banner = Banner::where('id' ,1)->first();
        $courses = Course::latest()->get();

        return \view('app.reviews.index', compact('reviews', 'banner', 'courses'));
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
