<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\EditArticleRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function show($id): View
    {
        $article = Article::findOrFail($id);

        return view('article.show', compact('article'));
    }

    public function create(): View
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

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

    public function edit($id): RedirectResponse|View
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(EditArticleRequest $request, $id): RedirectResponse
    {
        $article = Article::findOrFail($id);
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

    public function destroy($id): RedirectResponse
    {
        $article = Article::find($id);
        $article?->delete();
        return redirect()->route('articles.index');
    }
}
