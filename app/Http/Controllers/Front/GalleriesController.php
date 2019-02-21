<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use App\Models\Page\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class GalleriesController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::latest('id')->get();
        $banner = Banner::where('title' ,'Галерея')->first();

        return \view('app.galleries.index', compact('galleries', 'banner'));
    }
}
