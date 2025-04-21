<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Banner;

class BannerController extends Controller
{
	public function index()
	{
		$categories = Category::with('subcategories')->get();
		return view('home', compact('categories'));
	}

	public function banner($id)
	{
		$subcategory = Subcategory::with('banners')->findOrFail($id);
		return view('banner', compact('subcategory'));
	}

	public function show($categoria, $subcategoria, $title)
	{
		$banner = Banner::where('slug', $title)
			->whereHas('subcategory', function ($query) use ($subcategoria, $categoria) {
				$query->where('slug', $subcategoria)
					->whereHas('category', function ($q) use ($categoria) {
						$q->where('slug', $categoria);
					});
			})
			->with('subcategory.category')
			->firstOrFail();
		
		// URL actual del banner
    $currentUrl = url()->current();

		return view('banner', compact('banner', 'currentUrl'));
	}
}
