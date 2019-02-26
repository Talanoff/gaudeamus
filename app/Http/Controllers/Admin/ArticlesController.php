<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use App\Models\Article\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return \view('admin.articles.index', [
            'articles' => Article::paginate(20),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return \view('admin.articles.create', [
        'tags' => Tag::get(),
    ]);
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


        $article = Article::create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => Auth::user()->id,

        ]);



        $article->tags()->sync($request->input('tags'));
        if ($request->hasFile('article')) {
            $article->addMediaFromRequest('article')
                ->toMediaCollection('article');
        }
        return \redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно сохранена.');
    }


    public function edit(Article $article)
    {
        $tags = Tag::get();
        return \view('admin.articles.edit', compact('article', 'tags'));
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {

        $article->update($request->only('title', 'body'));
        $article->tags()->sync($request->input('tags'));
        if ($request->hasFile('article')) {
            $article->clearMediaCollection('article');
            $article->addMediaFromRequest('article')
                ->toMediaCollection('article');
        }
        return \redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete($article->image);
        }
        $article->delete();
        return \redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
