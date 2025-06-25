<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComputerInventoryResource\Pages;
use App\Filament\Resources\ComputerInventoryResource\RelationManagers;
use App\Models\ComputerInventory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComputerInventoryResource extends Resource
{
    protected static ?string $model = ComputerInventory::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('barcode')
                        ->label('Código de barras')
                        ->required()
                        ->maxLength(255)
                        ->live()
                        ->autofocus() // Opcional: enfoca al cargar
                        ->afterStateHydrated(fn ($state, callable $set) => $set('barcode', $state)),

                Forms\Components\TextInput::make('internal_code')
                        ->label('Código interno')
                        ->required()
                        ->maxLength(255)
                        ->live()
                        ->afterStateHydrated(fn ($state, callable $set) => $set('internal_code', $state)),
                Forms\Components\Select::make('status')
                    ->label("Estado")
                    ->options([
                        'available' => 'Disponible',
                        'borrowed' => 'Prestado',
                        'damaged' => 'Dañado',
                    ])
                    ->required(),
                Forms\Components\Select::make('computer_id')
                    ->label("Nombre del Computador o Portatil")
                    ->relationship('computer', 'model')
                     ->createOptionForm([
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
                            ])
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\BelongsToManyMultiSelect::make('accessories')
                    ->relationship('accesories', 'name')
                    ->label('Accesorios')
                    ->preload()
                    ->live()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->label("Nombre del Accesorio")
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('internal_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('barcode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('computer.brand')->label('Marca')
                    ->sortable(),
                Tables\Columns\TextColumn::make('computer.model')->label('Model'),
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
            'index' => Pages\ListComputerInventories::route('/'),
            'create' => Pages\CreateComputerInventory::route('/create'),
            'view' => Pages\ViewComputerInventory::route('/{record}'),
            'edit' => Pages\EditComputerInventory::route('/{record}/edit'),
        ];
    }
}
