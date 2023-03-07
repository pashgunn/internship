<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Storage;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            'public/pictures/test_banner_1.jpg',
            'public/pictures/test_banner_2.jpg',
            'public/pictures/test_banner_3.jpg'
        ];

        $banners = [];

        foreach ($images as $image) {
            $path = Storage::putFile('public/banners', $image);
            $banners[] = Image::factory()
                ->sequence(fn($sequence) => [
                    'path' => 'banners/' . basename($path)
                ])
                ->create();
        }

        foreach ($banners as $banner) {
            Banner::factory()
                ->sequence(fn($sequence) => [
                    'url' => null,
                    'image_id' => $banner
                ])
                ->create();
        }

    }
}
