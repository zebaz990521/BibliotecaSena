<?php

namespace App\Filament\Resources\ComputerInventoryResource\Pages;

use App\Filament\Resources\ComputerInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewComputerInventory extends ViewRecord
{
    protected static string $resource = ComputerInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
