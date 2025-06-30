<?php

namespace App\Filament\Resources\BookInventoryResource\Pages;

use App\Filament\Resources\BookInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookInventories extends ListRecords
{
    protected static string $resource = BookInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
