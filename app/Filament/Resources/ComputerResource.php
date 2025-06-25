<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComputerResource\Pages;
use App\Filament\Resources\ComputerResource\RelationManagers;
use App\Models\Computer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComputerResource extends Resource
{
    protected static ?string $model = Computer::class;

      protected static ?string $navigationGroup = 'Administracion Equipos y Libros';

    protected static ?string $navigationLabel = "Computadores y Portatiles";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->label("Marca")
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->label("Modelo")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('serial_number')
                    ->label("Numero de serie")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('processor')
                    ->label("Procesador")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ram_size')
                    ->label("Espacio de Ram")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('storage_size')
                    ->label("Espacio de Almacenamiento")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('operating_system')
                    ->label("Sistema Operativo")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->label("Localizacion o puesto")
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('computer_type')
                    ->label("Tipo de Computador")
                    ->options(options: [
                        'desktop' => 'Escritorio',
                        'laptop' => 'Portatil',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('processor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ram_size')
                    ->searchable(),
                Tables\Columns\TextColumn::make('storage_size')
                    ->searchable(),
                Tables\Columns\TextColumn::make('operating_system')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('computer_type'),
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
            'index' => Pages\ListComputers::route('/'),
            'create' => Pages\CreateComputer::route('/create'),
            'view' => Pages\ViewComputer::route('/{record}'),
            'edit' => Pages\EditComputer::route('/{record}/edit'),
        ];
    }
}
