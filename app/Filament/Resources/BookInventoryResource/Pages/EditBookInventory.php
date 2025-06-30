<?php

namespace App\Filament\Resources\BookInventoryResource\Pages;

use App\Filament\Resources\BookInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookInventory extends EditRecord
{
    protected static string $resource = BookInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
