<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ThanksController extends Controller
{
    public function index(): View
    {
        return \view('app.thanks.index', [
            'banner' => Banner::where('id', 13)->first(),
        ]);
    }
}
