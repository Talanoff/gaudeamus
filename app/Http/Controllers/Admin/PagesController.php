<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Page\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index(): View
    {
        return \view('admin.pages.index', [
            'pages' => Page::latest('id')->get(),
        ]);
    }

    public function edit(Page $page)
    {
        return \view('admin.pages.edit', [
            'page' => $page,

        ]);
    }

    public function update(Request $request, Page $page)
    {
        $page->update($request->only('title', 'body'));

        return \redirect()->route('admin.pages.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();
        return \redirect()->route('admin.pages.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
