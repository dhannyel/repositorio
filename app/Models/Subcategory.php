<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Subcategory extends Model
{
	protected $guarded = [];

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	public function banners(): HasMany
	{
		return $this->hasMany(Banner::class);
	}

	protected static function boot()
	{
		parent::boot();

		static::saving(function ($subcategory) {
			// Solo generar nuevo slug si el nombre ha cambiado
			if ($subcategory->isDirty('name')) {
				$subcategory->slug = static::generateUniqueSlug($subcategory->name, $subcategory->id);
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
