<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Common\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        return \view('admin.questions.index', [
            'questions' => Question::latest('id')->get(),
        ]);
    }

    public function create()
    {
        return \view('admin.questions.create');
    }

    public function store(Request $request)
    {
        $question = Question::create([
            'question' => $request->get('question'),
            'answer' => $request->get('answer'),
        ]);
        return \redirect()->route('admin.questions.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Question $question)
    {
        return \view('admin.questions.edit', [
            'question' => $question]);

    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->only('question', 'answer'));
        return \redirect()->route('admin.questions.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();
        return \redirect()->route('admin.questions.index')
            ->with('message', 'Запись успешно удалена.');
    }


}
