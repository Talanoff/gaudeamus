<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page\Respond;
use App\Models\Page\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RespondsController extends Controller
{
    public function index()
    {
        return \view('admin.responds.index', [
            'responds' => Respond::latest('id')->paginate(20),
        ]);
    }

    public function edit(Respond $respond)
    {
        return \view('admin.responds.edit', [
            'respond' => $respond,
            'vacancy' => Vacancy::where('id', $respond->vacancy_id)->first(),
        ]);
    }

    public function update(Request $request, Respond $respond)
    {
        $respond->update($request->only('status'));

        return \redirect()->route('admin.responds.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Respond $respond): RedirectResponse
    {
        $respond->delete();
        return \redirect()->route('admin.responds.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
