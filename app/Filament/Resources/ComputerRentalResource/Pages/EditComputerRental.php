<?php

namespace App\Filament\Resources\ComputerRentalResource\Pages;

use App\Filament\Resources\ComputerRentalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComputerRental extends EditRecord
{
    protected static string $resource = ComputerRentalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
