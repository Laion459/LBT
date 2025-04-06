<?php

namespace App\Filament\Resources\CreditCardTransactionResource\Pages;

use App\Filament\Resources\CreditCardTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCreditCardTransaction extends EditRecord
{
    protected static string $resource = CreditCardTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
