<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Article\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FaqsController extends Controller
{

    public function index(): View
    {
        return \view('admin.faqs.index', [
            'faqs' => Faq::latest('id')->get(),
        ]);
    }

    public function create()
    {
        return \view('admin.faqs.create');
    }

    public function store(Request $request)
    {

        $faq = Faq::create($request->only('title', 'body'));
        if ($request->hasFile('faq')) {
            $faq->addMediaFromRequest('faq')
                ->toMediaCollection('faq');
        }
        return \redirect()->route('admin.faq.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Faq $faq)
    {
        return \view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($request->only('title', 'body'));
        if ($request->hasFile('faq')) {
            $faq->clearMediaCollection('faq');
            $faq->addMediaFromRequest('faq')
                ->toMediaCollection('faq');
        }
        return \redirect()->route('admin.faq.index')
            ->with('message', 'Запись успешно сохранена.');
    }


    public function destroy(Faq $faq)
    {
        if ($faq->image) {
            Storage::delete($faq->image);
        }
        $faq->delete();
        return \redirect()->route('admin.faq.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
