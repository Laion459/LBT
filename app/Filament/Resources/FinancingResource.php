<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinancingResource\Pages;
use App\Models\Financing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FinancingResource extends Resource
{
    protected static ?string $model = Financing::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bank')
                    ->label('Banco')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Descrição')
                    ->maxLength(255),
                Forms\Components\TextInput::make('interest_rate')
                    ->label('Taxa de Juros')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('installments')
                    ->label('Parcelas')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('monthly_payment')
                    ->label('Pagamento Mensal')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('down_payment')
                    ->label('Entrada')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('paid')
                    ->label('Pago')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('owed')
                    ->label('Devido')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('total')
                    ->label('Total')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bank')->searchable(),
                Tables\Columns\TextColumn::make('description')->searchable(),
                Tables\Columns\TextColumn::make('interest_rate'),
                Tables\Columns\TextColumn::make('installments'),
                Tables\Columns\TextColumn::make('monthly_payment')->money('BRL'),
                Tables\Columns\TextColumn::make('down_payment')->money('BRL'),
                Tables\Columns\TextColumn::make('paid')->money('BRL'),
                Tables\Columns\TextColumn::make('owed')->money('BRL'),
                Tables\Columns\TextColumn::make('total')->money('BRL'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinancings::route('/'),
            'create' => Pages\CreateFinancing::route('/create'),
            'edit' => Pages\EditFinancing::route('/{record}/edit'),
        ];
    }
}
