<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use App\Models\Common\Quote;
use App\Models\Education\Course;
use App\Models\Page\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
        $about = Page::where('id', 3)->first();
        $banner = Banner::where('id', 10)->first();
        $courses = Course::latest()->get();

        return \view ('app.pages.about', compact('about', 'banner', 'courses'));
    }

    public function contacts()
    {
        $contacts = Page::where('id', 4)->first();
        $banner = Banner::where('id', 3)->first();
        $quote = Quote::where('id', 2)->first();

        return\view('app.pages.contacts', compact('contacts', 'banner', 'quote'));

    }

    public function rules()
    {
        $banner = Banner::where('id', 15)->first();
        $rules = Page::where('id', 5)->first();

        return \view ('app.pages/rules', compact('rules', 'banner'));
    }
}
