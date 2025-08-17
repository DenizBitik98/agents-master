<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleRailwayTicketReturn extends Model
{
    const STATUS_NOT_CHECKED = 0;
    const STATUS_QUEUED = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_REJECTED = 3;
    const STATUS_SUCCEEDED = 4;
    const STATUS_APPLIED = 5;
    const STATUS_ERROR = 6;

    protected $table = 'sale_railway_ticket_return';
    use HasFactory;

    protected $dates = [
        'time_before_departure',
        'returned_at'
    ];
	
	protected $fillable = [
      'ticket_id',
      'status',
      'amount',
      'krs',
      'returned_at',
      'transaction_id',
      'fks',
      'author_id',
      'manual_return_our_date',
      'mr_krs_filename',
      'mr_krs_fileimage',
      'manual_return_kassa_date',	  
	];	

    /**
     * @return BelongsTo
     */
    public function ticket() :BelongsTo{
        return $this->belongsTo(SaleRailwayTicket::class, 'ticket_id', 'id');
    }
	public function user(){
		return $this->belongsTo('App\Models\User','author_id','id');
	}	
}
