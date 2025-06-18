<?php

namespace App\Filament\Resources\PersonTypeResource\Pages;

use App\Filament\Resources\PersonTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPersonType extends ViewRecord
{
    protected static string $resource = PersonTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
