<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Aspect;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AspectsController extends Controller
{
    public function index(): View
    {
        return \view('admin.aspects.index', [
            'aspects' => Aspect::paginate(20),
        ]);
    }

    public function create(): View
    {
        return \view('admin.aspects.create');
    }

    public function store(Request $request)
    {
        $aspect = Aspect::create($request->only('title', 'description'));
        if ($request->hasFile('aspects_header')) {
            $aspect->addMediaFromRequest('aspects_header')
                ->toMediaCollection('aspects_header');
        }

        if ($request->hasFile('aspects_body')) {
            $aspect->addMediaFromRequest('aspects_body')
                ->toMediaCollection('aspects_body');
        }

        return \redirect()->route('admin.aspects.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Aspect $aspect): View
    {
        return \view('admin.aspects.edit', [
            'aspect' => $aspect,
        ]);
    }

    public function update(Request $request, Aspect $aspect)
    {
        $aspect->update($request->only('title', 'description'));

        if ($request->hasFile('aspects_header')) {
            $aspect->clearMediaCollection('aspects_header');
            $aspect->addMediaFromRequest('aspects_header')
                ->toMediaCollection('aspects_header');}

        if ($request->hasFile('aspects_body')) {
            $aspect->clearMediaCollection('aspects_body');
            $aspect->addMediaFromRequest('aspects_body')
                ->toMediaCollection('aspects_body');}

        return \redirect()->route('admin.aspects.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Aspect $aspect)
    {
        if ($aspect->image) {
            Storage::delete($aspect->image);
        }
        $aspect->delete();
        return \redirect()->route('admin.aspects.index')
            ->with('message', 'Запись успешно удалена.');
    }

}
