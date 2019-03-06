<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use App\Models\Education\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaterialsController extends Controller
{
    public function index(): View
    {
        return \view('admin.materials.index', [
            'materials' => Material::latest('id')->get()
        ]);
    }

    public function create()
    {
        return \view('admin.materials.create', [
            'courses' => Course::get(),
        ]);
    }

    public function store(Request $request)
    {

        $material = Material::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'body' => $request->get('body'),

        ]);
        $material->course()->sync($request->input('courses'));
        if ($request->hasFile('material')) {
            $material->addMediaFromRequest('material')
                ->toMediaCollection('material');
        }
        if ($request->hasFile('book')) {
            $material->addMediaFromRequest('book')->toMediaCollection('book');

        }
        return \redirect()->route('admin.materials.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Material $material): View
    {

        return \view('admin.materials.edit', [
            'material' => $material,
            'courses' => Course::get(),
        ]);
    }

    public function update(Request $request, Material $material)
    {
        $material->update($request->only('title', 'description', 'body'));
        $material->course()->sync($request->input('courses'));

        if ($request->hasFile('material')) {
            $material->clearMediaCollection('material');
            $material->addMediaFromRequest('material')
                ->toMediaCollection('material');
        }
        if ($request->hasFile('book')) {
            $material->clearMediaCollection('book');
            $material->addMediaFromRequest('book')->toMediaCollection('book');

        }
        return \redirect()->route('admin.materials.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Material $material): RedirectResponse
    {
        $material->clearMediaCollection('material');
        $material->clearMediaCollection('book');
        $material->delete();
        return \redirect()->route('admin.materials.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
