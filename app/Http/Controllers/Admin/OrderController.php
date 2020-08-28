<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function reorder(Request $request, $model)
    {
        $modelClass = $request->input('model');
        $model = (new $modelClass)->findOrFail($model);
        $direction = $request->input('direction');

        $model->{$direction}();

        return back();
    }
}
