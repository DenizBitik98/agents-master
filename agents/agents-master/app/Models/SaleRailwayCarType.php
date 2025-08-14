<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleRailwayCarType extends Model
{
    const COMMON = 'Общий';
    const SEDENTARY = 'Сидячий';
    const BERTH = 'Плацкартный';
    const COUPE = 'Купе';
    const SOFT = 'Мягкий';
    const LUX = 'Люкс';

    use HasFactory;
}
