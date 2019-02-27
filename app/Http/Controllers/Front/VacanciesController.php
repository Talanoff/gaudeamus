<?php

namespace App\Http\Controllers\Front;

use App\Models\Common\Banner;
use App\Models\Page\Respond;
use App\Models\Page\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VacanciesController extends Controller
{
    public function index()
    {
        $banner = Banner::where('id' , 6)->first();
        $bannerRespond = Banner::where('id' , 15)->first();
        $vacancies = Vacancy::latest('id')->get();

        return \view('app.vacancies.index', compact('banner', 'vacancies', 'bannerRespond'));
    }

    public function store(Request $request)
    {

        $respond = Respond::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'vacancy_id' => $request->input('vacancy_id'),
        ]);
        return \redirect()->route('app.thanks');

    }
}
