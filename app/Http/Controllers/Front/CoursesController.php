<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaterialResource;
use App\Models\Common\Banner;
use App\Models\Education\Course;
use App\Models\Education\Material;
use App\Models\Page\Page;

class CoursesController extends Controller
{
    public function index()
    {
        $banner = Banner::where('id', 9)->first();
        $page = Page::where('id', 1)->first();
        $courses = Course::latest()->get();
        return \view('app.programs.index', compact('page', 'banner', 'courses'));
    }

    public function show(Course $course)
    {
        $teachers = $course->teachers()->where('course_id', $course->id)->get();
        $materials = $course->materials()->where('course_id', $course->id)->orderByRaw("RAND()")->take(4)->get();
        $courses = Course::latest()->get();
        $description = explode('</p>', $course->description, '3' );



        return \view('app.programs.show', compact('course','teachers', 'materials', 'courses', 'description'));
    }
    public function getModalData(Material $material)
    {
        return response()->json(new MaterialResource($material));
    }
}
