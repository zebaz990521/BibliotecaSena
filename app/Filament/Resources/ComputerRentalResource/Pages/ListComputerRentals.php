<?php

namespace App\Filament\Resources\ComputerRentalResource\Pages;

use App\Filament\Resources\ComputerRentalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComputerRentals extends ListRecords
{
    protected static string $resource = ComputerRentalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
