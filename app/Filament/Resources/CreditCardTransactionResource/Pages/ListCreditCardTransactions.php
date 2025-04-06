<?php

namespace App\Filament\Resources\CreditCardTransactionResource\Pages;

use App\Filament\Resources\CreditCardTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCreditCardTransactions extends ListRecords
{
    protected static string $resource = CreditCardTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
