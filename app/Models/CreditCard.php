<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'card',
        'description',
        'installments',
        'value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
