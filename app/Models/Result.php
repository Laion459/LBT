<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment',
        'balance',
        'passive_income',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
