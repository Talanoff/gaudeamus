<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotesController extends Controller
{
    public function index()
    {
        return \view('admin.quotes.index', [
            'quotes' => Quote::latest('id')->get(),
        ]);
    }

    public function edit(Quote $quote)
    {
        return \view('admin.quotes.edit', [
            'quote' => $quote,

        ]);
    }

    public function update(Request $request, Quote $quote)
    {

        $quote->update($request->only('quote', 'author'));

        return \redirect()->route('admin.quotes.index')
            ->with('message', 'Запись успешно сохранена.');
    }
}
