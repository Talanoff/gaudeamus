<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ReviewsController extends Controller
{
    public function index(): View
    {
        return \view('admin.reviews.index', [
            'reviews' => Review::latest('id')->get(),
        ]);
    }

    public function edit(Review $review)
    {
        return \view('admin.reviews.edit', [
            'review' => $review,

        ]);
    }

    public function update(Request $request, Review $review)
    {
        $review->update($request->only('status'));

        return \redirect()->route('admin.reviews.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Review $review): RedirectResponse
    {
        $review->delete();
        return \redirect()->route('admin.reviews.index')
            ->with('message', 'Запись успешно удалена.');
    }
}