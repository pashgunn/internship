<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticleCreateUpdateServiceContract;
use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticlesController extends Controller
{
    public function __construct(
        private readonly ArticleRepositoryContract $articleRepository,
        private readonly ArticleCreateUpdateServiceContract $articleCreateUpdateService
    ) {
    }
    public function index(): View
    {
        $pagination = $this->articleRepository->getCatalog( 5);
        $articles = $pagination->items();
        return view('pages.articles.index', compact('articles', 'pagination'));
    }

    public function create(): View
    {
        return view('pages.articles.create');
    }

    public function show($article): View
    {
        $article = $this->articleRepository->find($article);
        return view('pages.articles.show', compact('article'));
    }

    public function store(ArticleRequest $articleRequest, TagRequest $tagRequest): RedirectResponse
    {
        $this->articleCreateUpdateService->create(
            $articleRequest,
            $tagRequest->getTags(),
            $articleRequest->file('image')
        );

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно создана');
    }

    public function edit($article): View
    {
        $article = $this->articleRepository->find($article);
        return view('pages.articles.edit', compact('article'));
    }

    public function update($slug, ArticleRequest $articleRequest, TagRequest $tagRequest): RedirectResponse
    {
        $this->articleCreateUpdateService->update(
            $this->articleRepository->find($slug),
            $articleRequest,
            $tagRequest->getTags(),
            $articleRequest->file('image')
        );

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно изменена');
    }

    public function destroy($article): RedirectResponse
    {
        $this->articleRepository->delete($article);
        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно удалена');
    }
}
