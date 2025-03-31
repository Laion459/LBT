<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTableControlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'revenue_description' => 'nullable|string|max:255',
            'revenue_value' => 'nullable|numeric',
            'expense_description' => 'nullable|string|max:255',
            'expense_value' => 'nullable|numeric',
            'actions' => 'nullable|numeric',
            'fixed_income' => 'nullable|numeric',
            'debt_item' => 'nullable|string|max:255',
            'debt_installments' => 'nullable|string|max:255',
            'debt_value' => 'nullable|numeric',
            'credit_card_card' => 'nullable|string|max:255',
            'credit_card_description' => 'nullable|string|max:255',
            'credit_card_installments' => 'nullable|string|max:255',
            'credit_card_value' => 'nullable|numeric',
            'financing_bank' => 'nullable|string|max:255',
            'financing_description' => 'nullable|string|max:255',
            'financing_interest_rate' => 'nullable|numeric',
            'financing_installments' => 'nullable|integer',
            'financing_monthly_payment' => 'nullable|numeric',
            'financing_down_payment' => 'nullable|numeric',
            'financing_paid' => 'nullable|integer',
            'financing_owed' => 'nullable|numeric',
            'financing_total' => 'nullable|numeric',
            'payment' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
            'passive_income' => 'nullable|numeric',
        ];
    }
}
