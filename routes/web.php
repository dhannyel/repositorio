<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;

Route::get('/', function () {
    $firstBanner = \App\Models\Banner::with('subcategory.category')->first();

    if ($firstBanner) {
        return redirect()->route('banner.show', [
            'categoria' => $firstBanner->subcategory->category->slug,
            'subcategoria' => $firstBanner->subcategory->slug,
            'title' => $firstBanner->slug,
        ]);
    }

    return redirect('/no-banners'); // o muestra una vista vacía
});

Route::get('/{categoria}/{subcategoria}/{title}', [BannerController::class, 'show'])->name('banner.show');
