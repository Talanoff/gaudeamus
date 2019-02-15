<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
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
=======
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
>>>>>>> origin/master
