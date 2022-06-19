<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessService extends Model
{
    const APROX_PRICE_LOW = 'low';
    const APROX_PRICE_NORMAL = 'normal';
    const APROX_PRICE_HIGH = 'high';
    const APROX_PRICES = [
        self::APROX_PRICE_LOW,
        self::APROX_PRICE_NORMAL,
        self::APROX_PRICE_HIGH,
    ];

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'price',
        'currency_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
