<?php

namespace App\Http\Controllers\Front;

use App\Models\Article\Review;
use App\Models\Common\Banner;
use App\Models\Common\Quote;
use App\Models\Education\Course;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TeachersController extends Controller
{
    public function index():View
    {
        return \view ('app.teachers.index', [
            'teachers' => User::where('role_id', 3)->paginate(6),
            'banner' => Banner::where('id', 7)->first(),
            'quote' => Quote::where('id', 1)->first(),
        ]);
    }

    public function show(User $teacher)
    {
        return \view('app.teachers.show', [
            'teacher' => $teacher,
            'banner' => Banner::where('id', 7)->first(),
            'reviews' => Review::latest()->take(12)->get(),
            'courses' => Course::latest()->get(),
            ]);
    }
}
