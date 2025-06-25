<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComputerRentalResource\Pages;
use App\Filament\Resources\ComputerRentalResource\RelationManagers;
use App\Models\ComputerRental;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComputerRentalResource extends Resource
{
    protected static ?string $model = ComputerRental::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('computer_inventory_id')
                    ->label("Inventario de Computadores")
                    ->relationship('computerInventories', 'barcode')
                    ->searchable()
                    ->live()
                    ->autofocus()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('identification_number')
                    ->label("Cedula Ciudadania")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->label("Nombre de la persona")
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('ficha_id')
                    ->relationship('ficha', 'name')
                    ->required(),
                Forms\Components\Select::make('person_type_id')
                    ->label("Tipo de Persona")
                    ->relationship('personType', 'name')
                    ->required(),
                Forms\Components\TextInput::make('phone_number')
                    ->label("Celular o Telefono")
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('datetime_out')
                    ->label("Fecha y hora de salida")
                    ->required(),
                Forms\Components\DateTimePicker::make('datetime_in')
                    ->label("Fecha y Hora de entrada"),
                Forms\Components\Livewire::make('signature')
                    ->component("signature-pad")
                    ->label("Firma"),
                Forms\Components\Toggle::make('received')
                    ->label("Recibido"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('identification_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ficha.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('personType.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('computer_inventory_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('datetime_out')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datetime_in')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('signature')
                    ->searchable(),
                Tables\Columns\IconColumn::make('received')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComputerRentals::route('/'),
            'create' => Pages\CreateComputerRental::route('/create'),
            'view' => Pages\ViewComputerRental::route('/{record}'),
            'edit' => Pages\EditComputerRental::route('/{record}/edit'),
        ];
    }
}
