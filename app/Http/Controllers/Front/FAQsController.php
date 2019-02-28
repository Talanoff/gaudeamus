<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article\Faq;
use App\Models\Common\Banner;
use App\Models\Education\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FAQsController extends Controller
{
    public function index(): View
    {
        $faqs =Faq::latest()->get();
        $banner = Banner::where('id' , 5)->first();
        $courses = Course::latest()->get();

        return \view('app.faqs.index', compact('faqs', 'banner', 'courses' ));
    }
}
