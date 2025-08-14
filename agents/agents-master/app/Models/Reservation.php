<?php

namespace App\Models;

use App\AppModels\RailwayReservation\ReservationStatus;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';

    protected $railwayReservation = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->railwayReservation = new ArrayCollection();
    }


    public function addRailwayReservation(SaleRailwayReservation $reservation){
        $this->railwayReservation->add($reservation);
    }


    public function getRailwayReservations(){
        return $this->railwayReservation;
    }


    public function getRailwayReservationsRelations(){
        return $this->hasMany(SaleRailwayReservation::class, 'reservation_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function agent() :BelongsTo{
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }

    public function isPayed(){

        foreach ($this->getRailwayReservationsRelations as $rr) {
            if($rr->status == ReservationStatus::RESERVATION_NEW){
                return false;
            }
        }

        return true;
    }

}
