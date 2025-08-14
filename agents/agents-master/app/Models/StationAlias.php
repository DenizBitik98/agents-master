<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationAlias extends Model
{
    use HasFactory;
	
	    protected $fillable = [
        'station_code',
        'station_name',
    ];
}
