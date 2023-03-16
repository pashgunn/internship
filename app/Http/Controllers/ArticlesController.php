<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\CreateArticleServiceContract;
use App\Contracts\Repositories\UpdateArticleServiceContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct(
        private readonly ArticleRepositoryContract $articleRepository,
        private readonly CreateArticleServiceContract $createArticleService,
        private readonly UpdateArticleServiceContract $updateArticleService
    ) {
    }
    public function index(Request $request): View
    {
        $pagination = $this->articleRepository->getArticlesCatalog($request->input('page') ?? 1, 5);
        $articles = $pagination->items();
        return view('pages.articles.index', compact('articles', 'pagination'));
    }

    public function create(): View
    {
        $this->authorize('create', Article::class);
        return view('pages.articles.create');
    }

    public function show($slug): View
    {
        $article = $this->articleRepository->findBySlug($slug);
        return view('pages.articles.show', compact('article'));
    }

    public function store(ArticleRequest $articleRequest, TagRequest $tagRequest): RedirectResponse
    {
        $this->authorize('create', Article::class);
        $this->createArticleService->create(
            $articleRequest,
            $tagRequest->getTags(),
            $articleRequest->file('image')
        );

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно создана');
    }

    public function edit($slug): View
    {
        $this->authorize('update', Article::class);
        $article = $this->articleRepository->findBySlug($slug);
        return view('pages.articles.edit', compact('article'));
    }

    public function update($slug, ArticleRequest $articleRequest, TagRequest $tagRequest): RedirectResponse
    {
        $this->authorize('update', Article::class);
        $this->updateArticleService->update(
            $this->articleRepository->findBySlug($slug),
            $articleRequest,
            $tagRequest->getTags(),
            $articleRequest->file('image')
        );

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно изменена');
    }

    public function destroy($article): RedirectResponse
    {
        $this->authorize('delete', Article::class);
        $this->articleRepository->delete($article);

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно удалена');
    }
}
