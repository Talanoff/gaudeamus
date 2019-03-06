<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleriesController extends Controller
{
    public function index()
    {

        return \view('admin.galleries.index', [
            'galleries' => Gallery::latest('id')->paginate(20),
        ]);
    }

    public function create()
    {
        return \view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $gallery = Gallery::create($request->only('title'));
        if ($request->hasFile('gallery')) {
            $gallery->addMediaFromRequest('gallery')
                ->toMediaCollection('gallery');
        }
        return \redirect()->route('admin.galleries.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Gallery $gallery): View
    {
        return \view('admin.galleries.edit', [
            'gallery' => $gallery,
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $gallery->update($request->only('title'));
        if ($request->hasFile('gallery')) {
            $gallery->clearMediaCollection('gallery');
            $gallery->addMediaFromRequest('gallery')
                ->toMediaCollection('gallery');}
        return \redirect()->route('admin.galleries.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->clearMediaCollection('gallery');
        $gallery->delete();
        return \redirect()->route('admin.galleries.index')
            ->with('message', 'Запись успешно удалена.');
    }


}
