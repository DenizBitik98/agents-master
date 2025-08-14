<?php


namespace App\AppModels\RailwayReservation;


class ReservationStatus
{
    const RESERVATION_NEW = 1;
    const RESERVATION_CONFIRMING = 2;
    const RESERVATION_CONFIRMED = 3;
    const RESERVATION_CONFIRM_ERROR = -1;
    const RESERVATION_RETURNING = 4;
    const RESERVATION_RETURNED = 5;
    const RESERVATION_RETURNED_MANUAL = 51;
    const RESERVATION_RETURN_ERROR = -2;
    const RESERVATION_CANCELED = -3;
}
