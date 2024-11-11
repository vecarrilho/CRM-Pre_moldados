<?php

namespace App\Filament\Resources;

use App\Enums\StatusEnum;
use App\Filament\Resources\SheetResource\Pages;
use App\Filament\Resources\SheetResource\RelationManagers;
use App\Models\Sheet;
use App\Models\Client;
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
                Forms\Components\Select::make('client_id')
                    ->label(__('Client'))
                    ->options(Client::where('status', true)->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label(__('Construction name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('uf')
                    ->label(__('Construction uf'))
                    ->required()
                    ->options([
                        'AC' => 'Acre',
                        'AL' => 'Alagoas',
                        'AP' => 'Amapá',
                        'AM' => 'Amazonas',
                        'BA' => 'Bahia',
                        'CE' => 'Ceará',
                        'DF' => 'Distrito Federal',
                        'ES' => 'Espírito Santo',
                        'GO' => 'Goiás',
                        'MA' => 'Maranhão',
                        'MT' => 'Mato Grosso',
                        'MS' => 'Mato Grosso do Sul',
                        'MG' => 'Minas Gerais',
                        'PA' => 'Pará',
                        'PB' => 'Paraíba',
                        'PR' => 'Paraná',
                        'PE' => 'Pernambuco',
                        'PI' => 'Piauí',
                        'RJ' => 'Rio de Janeiro',
                        'RN' => 'Rio Grande do Norte',
                        'RS' => 'Rio Grande do Sul',
                        'RO' => 'Rondônia',
                        'RR' => 'Roraima',
                        'SC' => 'Santa Catarina',
                        'SP' => 'São Paulo',
                        'SE' => 'Sergipe',
                        'TO' => 'Tocantins',
                    ])
                    ->searchable(),
                Forms\Components\TextInput::make('city')
                    ->label(__('Construction city'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cep')
                    ->label(__('Construction cep'))
                    ->required()
                    ->mask('99999-999'),
                Forms\Components\TextInput::make('max_height')
                    ->label(__('Construction max height'))
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('max_length')
                    ->label(__('Construction max length'))
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('has_stake')
                    ->label(__('Construction has stake'))
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->readonly()
                    ->hiddenOn('create')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.name')
                    ->label(__('Client'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label(__('Construction name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label(__('Construction city'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('uf')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label(__('Construction uf'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('cep')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_height')
                    ->label(__('Construction max height'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_length')
                    ->label(__('Construction max length'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('has_stake')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label(__('Construction has stake'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => StatusEnum::from($state)?->getLabel())
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
