<?php

namespace App\Http\Controllers\Front;

use App\Models\Page\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {

        $feedback = Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'course_id' => $request->input('course_id'),
        ]);
        return \redirect()->route('app.thanks');

    }
}
