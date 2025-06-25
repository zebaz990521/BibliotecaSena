<?php

namespace App\Filament\Resources\ComputerRentalResource\Pages;

use App\Filament\Resources\ComputerRentalResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewComputerRental extends ViewRecord
{
    protected static string $resource = ComputerRentalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
