<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanResource\Pages;
use App\Filament\Resources\LoanResource\RelationManagers;
use App\Models\Loan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_delivery_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_received_id')
                    ->numeric(),
                Forms\Components\Select::make('trainee_id')
                    ->relationship('trainee', 'id'),
                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher', 'id'),
                Forms\Components\Select::make('administrative_id')
                    ->relationship('administrative', 'id'),
                Forms\Components\Select::make('user_type_id')
                    ->relationship('userType', 'name')
                    ->required(),
                Forms\Components\Select::make('loan_type_id')
                    ->relationship('loanType', 'id')
                    ->required(),
                Forms\Components\DateTimePicker::make('datetime_out')
                    ->required(),
                Forms\Components\DateTimePicker::make('datetime_in'),
                Forms\Components\Textarea::make('signature')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_delivery_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_received_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trainee.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teacher.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('administrative.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('userType.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('loanType.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datetime_out')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datetime_in')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListLoans::route('/'),
            'create' => Pages\CreateLoan::route('/create'),
            'view' => Pages\ViewLoan::route('/{record}'),
            'edit' => Pages\EditLoan::route('/{record}/edit'),
        ];
    }
}
