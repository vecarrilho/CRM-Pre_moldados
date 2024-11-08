<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('Client');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cpf_cnpj')
                    ->label(__('Cpf cnpj'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__('Phone'))
                    ->mask('(99) 99999-9999')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->label(__('City'))
                    ->maxLength(255),
                Forms\Components\Select::make('uf')
                    ->label(__('Uf'))
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
                Forms\Components\TextInput::make('cep')
                    ->mask('99999-999'),
                Forms\Components\TextInput::make('street')
                    ->label(__('Street'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('address_number')
                    ->label(__('Address number'))
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->hiddenOn('create')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf_cnpj')
                    ->label(__('Cpf cnpj'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->label(__('City'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('uf')
                    ->label(__('Uf'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('cep')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('street')
                    ->label(__('Street'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_number')
                    ->label(__('Address number'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
