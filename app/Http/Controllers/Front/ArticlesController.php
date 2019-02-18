<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use Illuminate\View\View;

class ArticlesController extends Controller
{
    public function index(): View
    {
        $articles = Article::paginate(12);

        return \view('app.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article->handleViewed();
        return \view('app.articles.show', [
            'article'=> $article,
            'interested' => Article::orderByRaw("RAND()")->take(3)->get(),
        ]);
    }
}
