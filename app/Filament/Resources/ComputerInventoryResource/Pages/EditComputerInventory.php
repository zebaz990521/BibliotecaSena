<?php

namespace App\Filament\Resources\ComputerInventoryResource\Pages;

use App\Filament\Resources\ComputerInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComputerInventory extends EditRecord
{
    protected static string $resource = ComputerInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
