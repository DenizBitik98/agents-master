<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExporttoFtp extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'agent_id',	
        'ftplog',
        'ftppass',
        'ftpadd',	
    ];
	
	public function agent(){
		return $this->belongsTo('App\Models\Agent','agent_id','id');
	}		
}
