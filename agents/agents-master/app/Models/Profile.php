<?php

namespace App\Models;

use App\Services\KTJ\CarriageGenerator\Builder\Lux\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    public $timestamps = true;

    protected $table = 'profiles';

    use HasFactory;

    public $value = '';
    public $documentTypeDctsValue = '';
    public $citizenshipDctsValue = '';


    protected $dates = [
        'birthday'
    ];
    public function scopeSurname($query, $surname)
    {
        return $query->where('surname', 'like', '%' . $surname . '%') ?? $query;
    }

    public function scopePassengerIin($query, $passenger_iin)
    {
        return $query->where('passenger_iin','=',$passenger_iin) ?? $query;
    }
}
