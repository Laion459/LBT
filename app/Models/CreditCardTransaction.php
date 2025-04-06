<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreditCardTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'credit_card_id',
        'date',
        'description',
        'amount',
        'installments',
        'installment_number',
        'category_id',
        'notes',
    ];

    /**
     * Get the credit card that owns the transaction.
     */
    public function creditCard(): BelongsTo
    {
        return $this->belongsTo(CreditCard::class);
    }

    /**
     * Get the category that owns the transaction.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::creating(function ($asset) {
            $asset->user_id = auth()->id();
        });
    }
}
