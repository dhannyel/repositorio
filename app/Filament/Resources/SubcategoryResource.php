<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubcategoryResource\Pages;
use App\Filament\Resources\SubcategoryResource\RelationManagers;
use App\Models\Subcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubcategoryResource extends Resource
{
	protected static ?string $model = Subcategory::class;
	protected static ?string $navigationGroup = 'Administración Repositorio';
	protected static ?string $navigationLabel = 'Subcategorías';
	protected static ?string $navigationIcon = 'heroicon-o-queue-list';
	protected static ?int $navigationSort = 2;

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				//Categoría:
				Forms\Components\Select::make('category_id')
					->relationship('category', 'name')
					->label('Seleccione la categoría')
					->required(),
				//Nombre:
				Forms\Components\TextInput::make('name')
					->required()
					->label('Nombre de la subcategoría')
					->maxLength(255),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')
					->searchable(),
					Tables\Columns\TextColumn::make('category.name')->label('Categoría')
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
			'index' => Pages\ListSubcategories::route('/'),
			'create' => Pages\CreateSubcategory::route('/create'),
			'edit' => Pages\EditSubcategory::route('/{record}/edit'),
		];
	}
}
