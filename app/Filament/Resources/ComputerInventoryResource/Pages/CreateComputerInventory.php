<?php

namespace App\Filament\Resources\ComputerInventoryResource\Pages;

use App\Filament\Resources\ComputerInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Livewire\Attributes\On;

class CreateComputerInventory extends CreateRecord
{
    protected static string $resource = ComputerInventoryResource::class;

    // Escucha el evento desde el navegador
     #[On('barcodeScanned')] // Esta es la forma correcta en Livewire 3
    public function fillFromScan( $data): void
    {
        $this->form->fill([
            'barcode' => $data['barcode'],
            'internal_code' => $data['internal_code'],
        ]);
    }
}
