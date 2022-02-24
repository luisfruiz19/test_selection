<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\User as Author;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::query()
            ->with('author')
            ->active()
            ->orderBy('created_at', 'DESC')
            ->get();

        $authors = Author::query()
            ->active()
            ->get();

        return view('products', [
            'products' => $articles,
            'authors' => $authors
        ]);
    }


    public function store(ArticleStoreRequest $request)
    {
        $article = Article::create($request->validated());

        return redirect()->back()->with('success', 'Se creo correctamente el articulo ' . $article->title);
    }


    public function update(ArticleStoreRequest $request, Article $article)
    {
        $article->fill($request->validated());
        $article->save();
        return redirect()->back()->with('success', 'Se actualizo correctamente el articulo ' . $article->title);
    }


    /**
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with('success', 'Se eliminó correctamente el articulo');
    }
}
