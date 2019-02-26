<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        return \view('admin.settings.index', [
            'settings' => Setting::get()->groupBy('type'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        foreach ($request->input('settings') as $name => $value) {
            Setting::where('name', $name)->first()->update([
                'value' => $value,
            ]);
        }

        return \redirect()->route('admin.settings.index')
            ->with('message', 'Запись успешно сохранена.');
    }
}
