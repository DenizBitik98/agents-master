<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleRailwayTicket extends Model
{
    const STATUS_BOOKED = 0;
    const STATUS_CONFIRM_PROCESS = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_CONFIRM_FAILED = - 1;
    const STATUS_APPLIED_TO_RETURN = - 3;
    const STATUS_RETURNED = - 4;
    const STATUS_RETURN_FAILED = 3;


    protected $table = 'sale_railway_ticket';
    use HasFactory;

    protected $dates = [
        'fiscal_date',
        'stop_date'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->passengers = new ArrayCollection();
    }

    public $passengers = [];

    public function addPassenger(SaleRailwayPassenger $passenger){

        $this->passengers->add($passenger);
    }

    public function getPassengers(){
        return $this->passengers;
    }

    /**
     * @return float|int|null
     */
    public function getTotalCostWithAgentCommission(){

        $ret = $this->system_commission != null ? $this->system_commission : 0;

        $ret += $this->cost;

        return $ret;
    }

    public function tickerReturn(){
        return $this->hasOne(SaleRailwayTicketReturn::class, 'ticket_id', 'id' );
    }

    /**
     * @return BelongsTo
     */
    public function getReservation() :BelongsTo{
        return $this->belongsTo(SaleRailwayReservation::class, 'reservation_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function reservation() :BelongsTo{
        return $this->belongsTo(SaleRailwayReservation::class, 'reservation_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getRelatedPassengers(){
        return $this->hasMany(SaleRailwayPassenger::class, 'ticket_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function passengers(){
        return $this->hasMany(SaleRailwayPassenger::class, 'ticket_id', 'id');
    }

}
