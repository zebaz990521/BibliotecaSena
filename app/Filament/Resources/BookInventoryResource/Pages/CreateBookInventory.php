<?php

namespace App\Filament\Resources\BookInventoryResource\Pages;

use App\Filament\Resources\BookInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBookInventory extends CreateRecord
{
    protected static string $resource = BookInventoryResource::class;
}
