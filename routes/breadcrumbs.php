<?php

use App\Contracts\Repositories\CarRepositoryContract;
use App\Contracts\Repositories\CategoryRepositoryContract;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Contracts\Repositories\ArticleRepositoryContract;

//Pages
Breadcrumbs::for('homepage', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('homepage'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('О компании', route('about'));
});

Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Контактная информация', route('contacts'));
});

Breadcrumbs::for('sales-terms', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Условия продаж', route('sales-terms'));
});

Breadcrumbs::for('finance-department', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Финансовый отдел', route('finance-department'));
});

Breadcrumbs::for('for-clients', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Для клиентов', route('for-clients'));
});

Breadcrumbs::for('account', function (BreadcrumbTrail $trail) {
    $trail->push('Аккаунт', route('account'));
});

//Auth
Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->push('Логин', route('login'));
});

Breadcrumbs::for('register', function (BreadcrumbTrail $trail) {
    $trail->push('Регистрация', route('register'));
});

Breadcrumbs::for('password.request', function (BreadcrumbTrail $trail) {
    $trail->push('Восстановление пароля', route('password.request'));
});

Breadcrumbs::for('password.confirm', function (BreadcrumbTrail $trail) {
    $trail->push('Подтверждение пароля', route('password.confirm'));
});

//Products
$categoryRepository = app()->make(CategoryRepositoryContract::class);
$carRepository = app()->make(CarRepositoryContract::class);

Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Каталог', route('products.index'));
});

Breadcrumbs::for('products.category', function (BreadcrumbTrail $trail, string $slug) use ($categoryRepository) {
    $category = $categoryRepository->findBySlug($slug);
    $trail->parent('products.index');

    foreach ($category->ancestors as $ancestor) {
        $trail->push($ancestor->name, route('products.category', $ancestor->slug));
    }

    $trail->push($category->name, route('products.category', $category->slug));
} );

Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, string $id) use ($carRepository) {
    $product = $carRepository->find($id);
    $trail->parent('products.index');
    $trail->push($product->name, route('products.show', $product));
});


//Articles
$articleRepository = app()->make(ArticleRepositoryContract::class);

Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Новости', route('articles.index'));
});

Breadcrumbs::for('articles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('articles.index');
    $trail->push('Создание новости', route('articles.create'));
});

Breadcrumbs::for('articles.show', function (BreadcrumbTrail $trail, string $slug) use ($articleRepository) {
    $article = $articleRepository->findBySlug($slug);
    $trail->parent('articles.index');
    $trail->push($article->title, route('articles.show', $article));
});

Breadcrumbs::for('articles.edit', function (BreadcrumbTrail $trail, string $slug) use ($articleRepository) {
    $article = $articleRepository->findBySlug($slug);
    $trail->parent('articles.show', $slug);
    $trail->push('Редактирование новости', route('articles.edit', $article));
});
