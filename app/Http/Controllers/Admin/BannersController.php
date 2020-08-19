<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common\Banner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BannersController extends Controller
{
    public function index(): View
    {
        return \view('admin.banners.index', [
            'banners' => Banner::latest('id')->get(),
        ]);
    }

    public function edit(Banner $banner)
    {
        return \view('admin.banners.edit', [
            'banner' => $banner,
        ]);
    }

    public function update(Request $request, Banner $banner)
    {
        $banner->update($request->only('title'));

        if ($request->hasFile('banner')) {
            $banner->clearMediaCollection('banner');
            $banner->addMediaFromRequest('banner')->toMediaCollection('banner');
        }

        return \redirect()->route('admin.banners.index')
            ->with('message', 'Запись успешно сохранена.');
    }
}
