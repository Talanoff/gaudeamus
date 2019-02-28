<?php

namespace App\Http\Controllers\Admin;

use App\Models\Education\Course;
use App\Models\Page\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
        return \view('admin.feedback.index', [
            'feedbacks' => Feedback::latest('id')->paginate(20),
        ]);
    }

    public function edit(Feedback $feedback)
    {
        return \view('admin.feedback.edit', [
            'feedback' => $feedback,
            'course' => Course::where('id', $feedback->course_id)->first(),
        ]);
    }

    public function update(Request $request, Feedback $feedback)
    {
        $feedback->update($request->only('status'));

        return \redirect()->route('admin.feedback.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return \redirect()->route('admin.feedback.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
