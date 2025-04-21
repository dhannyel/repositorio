<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
	protected static ?string $model = Banner::class;
	protected static ?string $navigationGroup = 'Administración Repositorio';
	protected static ?string $navigationLabel = 'Banners';
	protected static ?string $navigationIcon = 'codicon-file-media';
	protected static ?int $navigationSort = 3;

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('title')
					->label('Título del Banner')
					->required(),
				Forms\Components\Select::make('subcategory_id')
					->label('Subcategoría')
					->relationship('subcategory', 'name')
					->required(),
				Forms\Components\TextInput::make('url')
					->label('HTML URL')
					->required()
					->url()
					->maxLength(255),
				Forms\Components\TextInput::make('width')
					->numeric()
					->required()
					->label('Ancho (px)'),
				Forms\Components\TextInput::make('height')
					->numeric()
					->required()
					->label('Alto (px)'),
				// Forms\Components\FileUpload::make('preview_image')
				// 	->image(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('title')
					->searchable(),
				Tables\Columns\TextColumn::make('subcategory.name')
					->numeric()
					->sortable(),
				Tables\Columns\TextColumn::make('url')
					->searchable(),
				Tables\Columns\TextColumn::make('created_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				Tables\Columns\TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
			])
			->filters([
				//
			])
			->actions([
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}

	public static function getRelations(): array
	{
		return [
			//
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListBanners::route('/'),
			'create' => Pages\CreateBanner::route('/create'),
			'edit' => Pages\EditBanner::route('/{record}/edit'),
		];
	}
}
