<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ToolsResource\Pages;
use App\Filament\Resources\ToolsResource\RelationManagers;
use App\Models\Tool;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ToolsResource extends Resource
{
	protected static ?string $model = Tool::class;
	protected static ?string $navigationGroup = 'Administración Dashboard';
	protected static ?string $navigationLabel = 'Herramientas';
	protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
	protected static ?int $navigationSort = 9;

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('title')
					->label('Título')
					->required(),

				Forms\Components\TextInput::make('email')
					->label('Correo Electrónico')
					->email(),

				Forms\Components\TextInput::make('phone')
					->label('Teléfono')
					->numeric(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('title')
					->label('Título')
					->sortable()
					->searchable(),

				Tables\Columns\TextColumn::make('email')
					->label('Correo Electrónico')
					->sortable()
					->searchable(),

				Tables\Columns\TextColumn::make('phone')
					->label('Teléfono')
					->sortable()
					->searchable(),
			])
			->filters([
				//
			])
			->actions([
				Tables\Actions\EditAction::make(), // Sólo permitir editar
			])
			->bulkActions([
				// Quitar las acciones masivas
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
			'index' => Pages\ListTools::route('/'),
			'create' => Pages\CreateTools::route('/create'),
			'edit' => Pages\EditTools::route('/{record}/edit'),
		];
	}
}
