<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Models\Article\Review;
use App\Models\Common\Banner;
use App\Models\Education\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewsController extends Controller
{

    public function index(): View
    {
        $reviews = Review::latest()->paginate(6);
        $banner = Banner::where('id', 1)->first();
        $courses = Course::latest()->get();

        return \view('app.reviews.index', compact('reviews', 'banner', 'courses'));
    }

    /**
     * @param ReviewStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ReviewStoreRequest $request): RedirectResponse
    {
        $video_id = null;

        /** @var Review $review */
        $review = Review::create([
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'user_name' => $request->input('name'),
            'message' => $request->input('message'),
        ]);

        if ($request->hasFile('video')) {
            $review->addMediaFromRequest('video')->toMediaCollection('video');
            $video_id = $this->getVideoID($review, Auth::check() ? Auth::user()->name : $request->name);
            $review->clearMediaCollection('video');
            if ($request->filled('video_id')) {
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
                    $request->input('video_id'), $matches);
                $video_id = isset($matches[1]) ? $matches[1] : null;
            }
        }


        if ($video_id) {
            $review->video_url = $video_id;
            $review->save();
        }

        return \redirect()->route('app.reviews.index');
    }

    /**
     * @param Review $review
     * @param $name
     * @return mixed
     */
    public function getVideoID(Review $review, $name)
    {
        $video = $review->getFirstMedia('video')->getPath();

        $video = \Youtube::upload($video, [
            'title' => 'Отзыв от ' . $name,
            'tags' => ['review'],
            'category_id' => 10
        ]);

        return $video->getVideoID();
    }
}
