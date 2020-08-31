<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\FeedbackSavingRequest;
use App\Models\Page\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function redirect;

class FeedbackController extends Controller
{
    public function store(FeedbackSavingRequest $request)
    {
        Feedback::create([
            'content' => $request->only('school', 'student_last_name', 'student_first_name', 'student_school', 'student_class', 'learning_ends', 'testing_needed', 'student_rating', 'sections', 'contact')
        ]);

        return redirect()->route('app.thanks');
    }
}
