<?php

namespace App\Http\Controllers\Admin;

use App\Models\User\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function view;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::latest('id')->paginate(20),
            'title' => __('All users'),
            'route' => 'students'
        ]);
    }
}
