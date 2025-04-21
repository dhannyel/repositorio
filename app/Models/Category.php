<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
	protected $guarded = [];

	public function subcategories(): HasMany
	{
		return $this->hasMany(Subcategory::class);
	}



	protected static function boot()
	{
		parent::boot();

		static::saving(function ($category) {
			// Solo generar nuevo slug si el nombre ha cambiado
			if ($category->isDirty('name')) {
				$category->slug = static::generateUniqueSlug($category->name, $category->id);
			}
		});
	}

	protected static function generateUniqueSlug($name, $column = 'slug')
	{
		$slug = Str::slug($name);
		$originalSlug = $slug;
		$count = 1;

		while (static::where($column, $slug)->exists()) {
			$slug = $originalSlug . '-' . $count++;
		}

		return $slug;
	}
}
