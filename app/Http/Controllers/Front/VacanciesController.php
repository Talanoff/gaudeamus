<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use App\Models\Page\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VacanciesController extends Controller
{
    public function index()
    {
        $banner = Banner::where('id' , 6)->first();
        $vacancies = Vacancy::latest('id')->get();

        return \view('app.vacancies.index', compact('banner', 'vacancies'));
    }
}
