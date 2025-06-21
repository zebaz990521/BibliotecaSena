<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label("Crear Usuario"),
        ];
    }

    public function getTabs(): array
    {
        return [
            'todos' => Tab::make()
                ->icon('heroicon-m-user-group')
                ->badge(User::query()->count())
                ->badgeColor('success'),
            'activos' => Tab::make()
                ->icon('heroicon-o-user-plus')
                ->badge(User::query()->where('status', true)->count())
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', true)),
            'inactivos' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', false))
                ->badge(User::query()->where('status', true)->count())
                ->badgeColor('danger'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'todos';
    }
}
