<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Раритетные'],
            ['name' => 'Новинки'],
            ['name' => 'Легковые', 'children' => ['Седаны', 'Хетчбеки', 'Универсалы', 'Купе', 'Родстеры']],
            ['name' => 'Внедорожники', 'children' => ['Рамные', 'Пикапы', 'Кроссоверы']]
        ];

        foreach ($categories as $category) {
            $categoryData = [
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'sort' => rand(0, 9)
            ];

            if (isset($category['children'])) {
                $categoryModel = Category::create($categoryData);
                $categoryModel->children()->createMany(array_map(function ($child) {
                    return [
                        'name' => $child,
                        'slug' => Str::slug($child),
                        'sort' => rand(0, 9)
                    ];
                }, $category['children']));
            } else {
                Category::create($categoryData);
            }
        }
    }
}
