<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common\Slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SlidesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.slides.index', [
            'slides' => Slides::latest('id')->paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.slides.create');
    }

    public function store(Request $request)
    {

        $slide = Slides::create($request->only('title', 'description', 'body'));
        if ($request->hasFile('slides')) {
            $slide->addMediaFromRequest('slides')
                ->toMediaCollection('slides');
        }
        return \redirect()->route('admin.slides.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Slides $slide
     * @return View
     */
    public function edit(Slides $slide): View
    {
        return \view('admin.slides.edit', [
            'slide' => $slide,
        ]);
    }

    public function update(Request $request, Slides $slide)
    {
        $slide->update($request->only('title', 'description', 'body'));
        if ($request->hasFile('slides')) {
            $slide->clearMediaCollection('slides');
            $slide->addMediaFromRequest('slides')
                ->toMediaCollection('slides');}
        return \redirect()->route('admin.slides.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Slides $slide)
    {
        $slide->clearMediaCollection('slides');
        $slide->delete();
        return \redirect()->route('admin.slides.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
