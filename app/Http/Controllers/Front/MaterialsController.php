<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use App\Models\Education\Course;
use App\Models\Education\Material;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{
    public function index()
    {
        $banner = Banner::where('id', 8)->first();
        $courses = Course::with('materials')->latest()->get();

        return \view('app.materials.index', compact('banner', 'courses'));

    }
}
