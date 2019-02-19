<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Common\Banner;
use App\Models\Common\Question;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionsController extends Controller
{
    public function index(): View
    {
        $questions =Question::latest()->get();
        $banner = Banner::where('title' ,'Вопросы')->first();

        return \view('app.questions.index', compact('questions', 'banner'));
    }
}
