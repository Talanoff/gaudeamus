<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        return \view('admin.tags.index', [
            'tags' => Tag::paginate(20),
        ]);
    }

    public function create()
    {
        return \view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->only('title'));

        return \redirect()->route('admin.tags.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function edit(Tag $tag)
    {
        return \view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->only('title'));

        return \redirect()->route('admin.tags.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return \redirect()->route('admin.tags.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
