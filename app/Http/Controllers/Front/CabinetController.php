<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Common\Banner;
use App\Models\Education\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CabinetController extends Controller
{
    public function index()
    {
        $banner = Banner::where('id', 16)->first();
        $user = Auth::user();

        return \view('app.cabinet.index', compact('banner', 'user'));
    }

    public function update(Request $request)
    {

        if ($request->name) {
            Auth::user()->update($request->only('name', 'phone', 'birthday'));
        } else {
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);
            $password = Hash::make($request->password);
            Auth::user()->update(['password' => $password]);
        }

        return \redirect()->route('app.cabinet.index') ->with('message', 'Изменения успешно сохранены.');
    }

}
