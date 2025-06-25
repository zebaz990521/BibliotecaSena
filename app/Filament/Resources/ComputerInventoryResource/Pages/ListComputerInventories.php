<?php

namespace App\Filament\Resources\ComputerInventoryResource\Pages;

use App\Filament\Resources\ComputerInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComputerInventories extends ListRecords
{
    protected static string $resource = ComputerInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
