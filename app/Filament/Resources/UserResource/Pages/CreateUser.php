<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

     protected function handleRecordCreation(array $data): User
    {
        $role = $data['role']; // extraemos el rol
        unset($data['role']);  // lo quitamos para evitar errores con fill()

        $user = User::create($data); // se crea el usuario

        $user->assignRole($role); // se asigna el rol con Spatie

        return $user;
    }
}
