<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleRailwayReservation extends Model
{
    const DIRECTION_FORWARD = 'forward';
    const DIRECTION_BACKWARD = 'backward';

    protected $table = 'sale_railway_reservation';

    use HasFactory;

    protected $dates = [
        'reserved_at',
        'departure_time',
        'arrival_time',
    ];

    protected $tickets = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->tickets = new ArrayCollection();
    }

    public function addTicket(SaleRailwayTicket $ticket){

        $this->tickets->add($ticket);
    }

    public function getTickets(){
        return $this->tickets;
    }

    public function getRelatedTickets(){
        return $this->hasMany(SaleRailwayTicket::class, 'reservation_id', 'id' );
    }

    /**
     * @return BelongsTo
     */
    public function getDepartureStation() :BelongsTo{
        return $this->belongsTo(SaleRailwayStation::class, 'departure_station_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function getArrivalStation() :BelongsTo{
        return $this->belongsTo(SaleRailwayStation::class, 'arrival_station_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function departureStation() :BelongsTo{
        return $this->belongsTo(SaleRailwayStation::class, 'departure_station_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function arrivalStation() :BelongsTo{
        return $this->belongsTo(SaleRailwayStation::class, 'arrival_station_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function getReservation() :BelongsTo{
        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function reservation() :BelongsTo{
        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }
}
