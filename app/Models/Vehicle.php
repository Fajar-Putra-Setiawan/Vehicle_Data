<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_plate',
        'damage_details',
        'car_merk',
        'total_price',
        'vehicle_photo',
        'special_notes',
        'entry_date'
    ];
}
