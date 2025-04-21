<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Banner;

class SlugSeeder extends Seeder
{
    public function run(): void
    {
        Category::all()->each(function ($category) {
            $category->slug = Str::slug($category->name);
            $category->save();
        });

        Subcategory::all()->each(function ($sub) {
            $sub->slug = Str::slug($sub->name);
            $sub->save();
        });

        Banner::all()->each(function ($banner) {
            $banner->slug = Str::slug($banner->title);
            $banner->save();
        });
    }
}
