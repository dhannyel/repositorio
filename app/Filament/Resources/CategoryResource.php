<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Livewire\CategoryIconInstructions;

class CategoryResource extends Resource
{
	protected static ?string $model = Category::class;
	protected static ?string $navigationGroup = 'Administración Repositorio';
	protected static ?string $navigationLabel = 'Categorías';
	protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
	protected static ?int $navigationSort = 1;

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nombre de la categoría')
					->required(),

				Forms\Components\TextInput::make('icon')
					->nullable()
					->label('Icon (Heroicons)'),

				// Agregar un campo de vista para renderizar el componente Livewire
				Forms\Components\View::make('livewire.category-icon-instructions'),
			]);
	}



	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')
					->searchable(),
					Tables\Columns\TextColumn::make('icon')
					->searchable(),
				Tables\Columns\TextColumn::make('created_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				Tables\Columns\TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: false),
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
			'index' => Pages\ListCategories::route('/'),
			'create' => Pages\CreateCategory::route('/create'),
			'edit' => Pages\EditCategory::route('/{record}/edit'),
		];
	}
}
