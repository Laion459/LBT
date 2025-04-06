<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreditCardTransactionResource\Pages;
use App\Models\CreditCardTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CreditCardTransactionResource extends Resource
{
    protected static ?string $model = CreditCardTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text'; // Escolha um ícone apropriado

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('credit_card_id')
                    ->label('Cartão de Crédito')
                    ->relationship('creditCard', 'card')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->label('Data')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->label('Descrição')
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->label('Valor')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('installments')
                    ->label('Parcelas')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('installment_number')
                    ->label('Número da Parcela')
                    ->numeric()
                    ->nullable(),
                Forms\Components\Select::make('category_id')
                    ->label('Categoria')
                    ->relationship('category', 'name')
                    ->nullable(),
                Forms\Components\Textarea::make('notes')
                    ->label('Notas')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('creditCard.card')->label('Cartão de Crédito'),
                Tables\Columns\TextColumn::make('date')->date(),
                Tables\Columns\TextColumn::make('description')->searchable(),
                Tables\Columns\TextColumn::make('amount')->money('BRL'),
                Tables\Columns\TextColumn::make('installments'),
                Tables\Columns\TextColumn::make('installment_number'),
                Tables\Columns\TextColumn::make('category.name')->label('Categoria'),
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
            'index' => Pages\ListCreditCardTransactions::route('/'),
            'create' => Pages\CreateCreditCardTransaction::route('/create'),
            'edit' => Pages\EditCreditCardTransaction::route('/{record}/edit'),
        ];
    }
}
