<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Banner extends Model
{
	protected $guarded = [];

	public function subcategory(): BelongsTo
	{
		return $this->belongsTo(Subcategory::class);
	}

	protected static function boot()
	{
		parent::boot();

		static::saving(function ($banner) {
			// Solo generar nuevo slug si el nombre ha cambiado
			if ($banner->isDirty('title')) {
				$banner->slug = static::generateUniqueSlug($banner->title, $banner->id);
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
