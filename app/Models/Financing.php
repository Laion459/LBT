<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank',
        'description',
        'interest_rate',
        'installments',
        'monthly_payment',
        'down_payment',
        'paid',
        'owed',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
