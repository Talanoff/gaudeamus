<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Article\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FAQsController extends Controller
{
    public function index()
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
        $faq = Faq::create([
            'question' => $request->get('question'),
            'answer' => $request->get('answer'),
        ]);
        return \redirect()->route('admin.faq.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Faq $faq)
    {
        return \view('admin.faqs.edit', [
            'faq' => $faq]);

    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($request->only('question', 'answer'));
        return \redirect()->route('admin.faq.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();
        return \redirect()->route('admin.faq.index')
            ->with('message', 'Запись успешно удалена.');
    }


}
