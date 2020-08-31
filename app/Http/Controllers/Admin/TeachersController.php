<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreationRequest;
use App\Models\Education\Course;
use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Http\Request;
use function redirect;
use function view;

class TeachersController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::where('role_id', 3)->paginate(20),
            'title' => __('Our team'),
            'route' => 'teachers',
        ]);
    }

    public function create()
    {
        return view('admin.users.teachers.create', [
            'courses' => Course::latest()->get(),
        ]);
    }

    public function store(UserCreationRequest $request)
    {
        /** @var User $user */
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('email')),
            'phone' => $request->input('phone'),
            'birthday' => $request->input('birthday'),
            'role_id' => Role::whereName('teacher')->first()->id,
            'is_confirmed' => 1
        ]);

        $user->courses()->sync($request->get('courses'));
        $user->profile()->create($request->only('position', 'description'));

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');
        }

        if ($request->has('files')) {
            foreach ($request->input('files') as $file) {
                $user->addMediaFromBase64($file)->toMediaCollection('certificates');
            }
        }

        return redirect()->route('admin.teachers.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(User $teacher)
    {
        return view('admin.users.teachers.edit', [
            'user' => $teacher,
            'courses' => Course::latest()->get(),
        ]);
    }

    public function update(Request $request, User $teacher)
    {
        $teacher->update($request->only('name', 'phone', 'birthday'));
        $teacher->courses()->sync($request->get('courses'));
        $teacher->profile()->updateOrCreate([
            'user_id' => $teacher->id,
        ], $request->only('position', 'description'));

        if ($request->hasFile('avatar')) {
            $teacher->clearMediaCollection('avatar');
            $teacher->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');
        }
        if ($request->has('files')) {
            foreach ($request->input('files') as $file) {
                $teacher->addMediaFromBase64($file)->toMediaCollection('certificates');
            }
        }


        return redirect()->route('admin.teachers.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(User $teacher)
    {
        $teacher->clearMediaCollection('avatar');
        $teacher->delete();

        return redirect()->route('admin.teachers.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
