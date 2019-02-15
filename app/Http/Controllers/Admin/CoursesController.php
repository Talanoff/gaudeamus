<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CoursesController extends Controller
{
    /**

     * @return View
     */

    public function index(): View
    {
        return \view('admin.courses.index', [
            'courses' => Course::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.

     */
    public function create()
    {
        return \view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.

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
    }
}
