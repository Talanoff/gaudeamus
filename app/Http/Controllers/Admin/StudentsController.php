<?php

namespace App\Http\Controllers\Admin;

use App\Models\Education\Course;
use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function redirect;
use function view;

class StudentsController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::orderByRaw("FIELD(is_confirmed , 0) DESC")
                ->where('role_id', 4)->paginate(20),
            'title' => 'Студенты',
            'route' => 'students'
        ]);
    }

    public function create()
    {
        return view('admin.users.students.create', [
            'courses' => Course::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('email')),
            'phone' => $request->get('phone'),
            'birthday' => $request->get('birthday'),
            'role_id' => Role::whereName(Role::$ROLES['student'])->first()->id,
            'is_confirmed' => 1
        ]);

        $user->courses()->sync($request->get('courses'));

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');
        }

        return redirect()->route('admin.users.index')
            ->with('message', 'Запись успешно сохранена.');

    }

    public function edit(User $student)
    {
        return view('admin.users.students.edit', [
            'user' => $student,
            'courses' => Course::latest()->get(),
        ]);
    }

    public function update(Request $request, User $student)
    {
        $attributes = $request->only('name', 'phone', 'birthday');
        $attributes['is_confirmed'] = $request->has('is_confirmed');

        $student->update($attributes);
        $student->courses()->sync($request->get('courses'));

        if ($request->hasFile('avatar')) {
            $student->clearMediaCollection('avatar');
            $student->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');
        }

        return redirect()->route('admin.users.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(User $student)
    {
        $student->clearMediaCollection('avatar');
        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
