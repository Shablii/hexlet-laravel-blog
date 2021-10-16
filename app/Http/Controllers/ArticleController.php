<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\EditArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function create(Article $article): View
    {
        return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest  $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $article = new Article();
        $article->fill($data);
        $article->save();

        return redirect()
            ->route('articles.index')
            ->with('flash_message', [
                'class' => 'success',
                'message' => 'Статья успешно добавлена'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return View
     */
    public function show(Article $article): View
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        return view('article.edit', compact('article'));
    }

    public function update(EditArticleRequest $request, $id ): RedirectResponse
    {
        $article = Article::find($id);
        $data = $request->validated();

        $article->fill($data);
        $article->save();
        return redirect()
            ->route('articles.index')
            ->with('flash_message', [
                'class' => 'info',
                'message' => 'Статья успешно обновлена'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()
            ->route('articles.index')
            ->with('flash_message', [
                'class' => 'success',
                'message' => 'Статья успешно удалена'
            ]);
    }
}
