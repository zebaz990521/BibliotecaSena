<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

     protected function mutateFormDataBeforeSave(array $data): array
    {

        /* dd($data); */
         // Buscar el usuario con el trait activo
        $user = User::find($this->record->getKey());

        dd($user);
        // Asignar rol correctamente con Spatie
        $user->assignRole($data['role']);

        unset($data['role']);
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {

        $user = User::find($this->record->getKey());
        $data['role'] = $user->getRoleNames()->first();

        return $data;
    }
}
