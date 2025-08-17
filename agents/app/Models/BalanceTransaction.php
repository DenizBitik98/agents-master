<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceTransaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'balance_transaction';

    protected $casts = [
        'action_sum' => 'decimal:2',
        'balance' => 'decimal:2',
        'action_date' => 'datetime',
    ];
}
