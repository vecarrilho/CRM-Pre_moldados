<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SheetResource\Pages;
use App\Filament\Resources\SheetResource\RelationManagers;
use App\Models\Sheet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SheetResource extends Resource
{
    protected static ?string $model = Sheet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('Sheet');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('client_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('uf')
                    ->required()
                    ->maxLength(2),
                Forms\Components\TextInput::make('cep')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('max_height')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('max_length')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('has_stake')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cep')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_height')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_length')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('has_stake')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
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
            'index' => Pages\ListSheets::route('/'),
            'create' => Pages\CreateSheet::route('/create'),
            'edit' => Pages\EditSheet::route('/{record}/edit'),
        ];
    }
}
