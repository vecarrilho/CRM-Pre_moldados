<?php

namespace App\Filament\Resources\SheetResource\Pages;

use App\Filament\Resources\SheetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSheets extends ListRecords
{
    protected static string $resource = SheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
