<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'name',
        'short_name',
        'address',
        'percent',
    ];

    public $timestamps = false;

    public function reserves()
    {
        return $this->hasMany(Reserv::class);
    }
}
