<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\ImageSaverContract;
use App\Contracts\Repositories\TagsSynchronizerContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticlesController extends Controller
{
    public function __construct(
        private readonly ArticleRepositoryContract $articleRepository,
        private readonly TagsSynchronizerContract  $tagsSynchronizer,
        private readonly ImageSaverContract $imageSaver
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
        $fields = $articleRequest->validated();
        $fields['published_at'] = $articleRequest->getPublishedAt();

        $file = $articleRequest->file('image');
        $image = $this->imageSaver->save($file);

        $fields['image_id'] = $image->id;
        unset($fields['image']);

        $article = $this->articleRepository->create($fields);

        $tags = $tagRequest->getTags();
        $this->tagsSynchronizer->sync($tags, $this->articleRepository->find($article->slug));

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
        $fields = $articleRequest->validated();
        $fields['published_at'] = $articleRequest->getPublishedAt();

        $file = $articleRequest->file('image');
        $image = $this->imageSaver->save($file);

        $fields['image_id'] = $image->id;
        unset($fields['image']);

        $this->articleRepository->update($slug,$fields);

        $tags = $tagRequest->getTags();
        $this->tagsSynchronizer->sync($tags, $this->articleRepository->find($slug));

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
