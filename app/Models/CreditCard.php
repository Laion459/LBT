<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CreditCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number', // Consider encrypting this
        'expiration_date',
        'cvv',      // Consider encrypting this
        'credit_limit',
        'available_credit',
        'interest_rate',
    ];

    /**
     * Get the transactions for the credit card.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
