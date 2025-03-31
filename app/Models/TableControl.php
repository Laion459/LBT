<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'revenue_description',
        'revenue_value',
        'expense_description',
        'expense_value',
        'actions',
        'fixed_income',
        'debt_item',
        'debt_installments',
        'debt_value',
        'credit_card_card',
        'credit_card_description',
        'credit_card_installments',
        'credit_card_value',
        'financing_bank',
        'financing_description',
        'financing_interest_rate',
        'financing_installments',
        'financing_monthly_payment',
        'financing_down_payment',
        'financing_paid',
        'financing_owed',
        'financing_total',
        'payment',
        'balance',
        'passive_income',
    ];
}
