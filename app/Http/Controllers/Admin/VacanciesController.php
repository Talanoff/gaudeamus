<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Page\Vacancy;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VacanciesController extends Controller
{
    public function index(): View
    {
        return \view('admin.vacancies.index', [
            'vacancies' => Vacancy::latest('id')->get(),
        ]);
    }

    public function create()
    {
        return \view('admin.vacancies.create');
    }

    public function store(Request $request)
    {

        $vacancy = Vacancy::create($request->only('title', 'description', 'responsibilities',
            'requirements', 'work_day', 'part_time', 'contact', 'phone', 'city'));
        if ($request->hasFile('vacancy')) {
            $vacancy->addMediaFromRequest('vacancy')
                ->toMediaCollection('vacancy');
        }
        return \redirect()->route('admin.vacancies.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Vacancy $vacancy)
    {
        return \view('admin.vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $vacancy->update($request->only('title', 'description', 'responsibilities',
            'requirements', 'work_day', 'part_time', 'contact', 'phone', 'city'));
        if ($request->hasFile('vacancy')) {
            $vacancy->clearMediaCollection('vacancy');
            $vacancy->addMediaFromRequest('vacancy')
                ->toMediaCollection('vacancy');
        }
        return \redirect()->route('admin.vacancies.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->clearMediaCollection('vacancy');
        $vacancy->delete();
        return \redirect()->route('admin.vacancies.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
