<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\RespondStoreRequest;
use App\Models\Common\Banner;
use App\Models\Page\Respond;
use App\Models\Page\Vacancy;
use App\Http\Controllers\Controller;

class VacanciesController extends Controller
{
    public function index()
    {
        $banner = Banner::where('id' , 6)->first();
        $bannerRespond = Banner::where('id' , 14)->first();
        $vacancies = Vacancy::latest('id')->get();

        return \view('app.vacancies.index', compact('banner', 'vacancies', 'bannerRespond'));
    }

    public function store(RespondStoreRequest $request)
    {

        $respond = Respond::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'vacancy_id' => $request->input('vacancy_id'),
        ]);

        if ($request->hasFile('resume')) {
            $respond->addMediaFromRequest('resume')->toMediaCollection('resume');

        }

        return \redirect()->route('app.thanks');

    }
}
