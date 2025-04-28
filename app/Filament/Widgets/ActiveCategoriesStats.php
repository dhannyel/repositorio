<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Banner;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActiveCategoriesStats extends BaseWidget
{
	protected function getStats(): array
	{
		return [
			Stat::make('Categorías', Category::count())
				->description('Total Categorías')
				->color('success')
				->icon('heroicon-o-rectangle-stack')
				->chart($this->getLastMonthCount('categories'))
				->url(route('filament.dashboard.resources.categories.index')),

			Stat::make('Subcategorías', Subcategory::count())
				->description('Total Subcategorías')
				->color('info')
				->icon('heroicon-o-rectangle-group')
				->chart($this->getLastMonthCount('subcategories'))
				->url(route('filament.dashboard.resources.subcategories.index')),

			Stat::make('Banners', Banner::count())
				->description('Total Banners')
				->color('primary')
				->icon('heroicon-o-photo')
				->chart($this->getLastMonthCount('banners'))
				->url(route('filament.dashboard.resources.banners.index')),
		];
	}

	// 🔥 Aquí abajo agregas la función privada
	private function getLastMonthCount(string $table): array
	{
		return collect(range(30, 1))
			->map(function ($daysAgo) use ($table) {
				$date = Carbon::today()->subDays($daysAgo)->toDateString();
				return DB::table($table)
					->whereDate('created_at', $date)
					->count();
			})
			->toArray();
	}
}
