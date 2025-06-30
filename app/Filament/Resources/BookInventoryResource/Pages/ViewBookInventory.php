<?php

namespace App\Filament\Resources\BookInventoryResource\Pages;

use App\Filament\Resources\BookInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBookInventory extends ViewRecord
{
    protected static string $resource = BookInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
