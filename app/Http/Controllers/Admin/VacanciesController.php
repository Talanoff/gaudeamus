<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Models\Page\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $vacancy = Vacancy::create($request->only('title', 'description'));
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
    $vacancy->update($request->only('title', 'body'));
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
        if ($vacancy->image) {
            Storage::delete($vacancy->image);
        }
        $vacancy->delete();
        return \redirect()->route('admin.vacancies.index')
            ->with('message', 'Запись успешно удалена.');
=======
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
>>>>>>> origin/master
    }
}
