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
        $lights = ['Седаны', 'Хетчбеки', 'Универсалы', 'Купе', 'Родстеры'];
        $suvs = ['Рамные', 'Пикапы', 'Кроссоверы'];
        $roots = ['Легковые', 'Внедорожники', 'Раритетные', 'Новинки'];

        foreach ($roots as $key => $root) {
            Category::factory()->make([
                'name' => $root,
                'slug' => Str::slug($root)
            ])->saveAsRoot();
        }
        foreach ($lights as $key => $light) {
            Category::factory()->make([
                'name' => $light,
                'slug' => Str::slug($light)
            ])->appendToNode(Category::where('name', "Легковые")->first())->save();
        }
        foreach ($suvs as $key => $suv) {
            Category::factory()->make([
                'name' => $suv,
                'slug' => Str::slug($suv)
            ])->appendToNode(Category::where('name', "Внедорожники")->first())->save();
        }
    }
}
