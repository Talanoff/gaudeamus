<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

=======
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
>>>>>>> origin/master

class CoursesController extends Controller
{
    /**
<<<<<<< HEAD
     * @return View
     */

    public function index(): View
    {
        return \view('admin.courses.index', [
            'courses' => Course::latest('id')->get()
        ]);
=======
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
>>>>>>> origin/master
    }

    /**
     * Show the form for creating a new resource.
<<<<<<< HEAD
     */
    public function create()
    {
        return \view('admin.courses.create');
=======
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
>>>>>>> origin/master
    }

    /**
     * Store a newly created resource in storage.
<<<<<<< HEAD
     */
    public function store(Request $request)
    {

        $course = Course::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'lessons' => $request->get('lessons'),
            'price' => $request->get('price'),
            'starts_at' => $request->get('starts_at'),
            'ends_at' => $request->get('ends_at'),
        ]);
        return \redirect()->route('admin.courses.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Course $course): View
    {
        return \view('admin.courses.edit', [
            'course' => $course
        ]);
    }


    public function update(Request $request, Course $course)
    {
        $course->update($request->only('title', 'description', 'lessons', 'price', 'starts_at', 'ends_at'));
        return \redirect()->route('admin.courses.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();
        return \redirect()->route('admin.courses.index')
            ->with('message', 'Запись успешно удалена.');
=======
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
>>>>>>> origin/master
    }
}
