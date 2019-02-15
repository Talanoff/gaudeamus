<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
<<<<<<< HEAD
        return \view('admin.articles.index', [
=======
        return \view('admin.article.create', [
>>>>>>> origin/master
            'articles' => Article::paginate(20),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
<<<<<<< HEAD
        return \view('admin.articles.create');
=======
        return \view('admin.article.create');
>>>>>>> origin/master
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
<<<<<<< HEAD

        $article = Article::create($request->only('title', 'body'));
        if ($request->hasFile('article')) {
            $article->addMediaFromRequest('article')
                ->toMediaCollection('article');}
=======
        Article::create($this->handleRequest($request));
>>>>>>> origin/master
        return \redirect()->route('admin.articles.index')
                          ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
<<<<<<< HEAD
        return \view('admin.articles.edit', compact('article'));
=======
        return \view('admin.article.edit', compact('article'));
>>>>>>> origin/master
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {
<<<<<<< HEAD
        $article->update($request->only('title', 'body'));
        if ($request->hasFile('article')) {
            $article->clearMediaCollection('article');
            $article->addMediaFromRequest('article')
                ->toMediaCollection('article');}
=======
        $article->update($this->handleRequest($request));
>>>>>>> origin/master
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

<<<<<<< HEAD

=======
    /**
     * @param Request $request
     * @return array
     */
    private function handleRequest(Request $request): array
    {
        $data = $request->only('title', 'body');

        if ($request->has('image')) {
            $data['image'] = $request->file('image')->store('article');
        }
        return $data;
    }
>>>>>>> origin/master
}
