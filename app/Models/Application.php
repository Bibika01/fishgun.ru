<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'gives',
        'gives_count',
        'take',
        'take_count',
        'wallet_address',
        'email',
        'status'
    ];
}
