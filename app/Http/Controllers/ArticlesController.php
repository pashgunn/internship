<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\CreateArticleServiceContract;
use App\Contracts\Repositories\UpdateArticleServiceContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        return view('pages.articles.create');
    }

    public function show($slug): View
    {
        $article = $this->articleRepository->findBySlug($slug);
        return view('pages.articles.show', compact('article'));
    }

    public function store(ArticleRequest $articleRequest, TagRequest $tagRequest): RedirectResponse
    {
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
        $article = $this->articleRepository->findBySlug($slug);
        return view('pages.articles.edit', compact('article'));
    }

    public function update($slug, ArticleRequest $articleRequest, TagRequest $tagRequest): RedirectResponse
    {
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
        $this->articleRepository->delete($article);

        //delete cache for article
        Cache::tags(['articles', 'images', 'tags'])->flush();

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно удалена');
    }
}
