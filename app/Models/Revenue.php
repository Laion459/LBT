<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
