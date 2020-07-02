<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tQuery extends Model
{
    protected $table = 't_query';
    //public $timestamps = false;
    protected $guarded = [];

	public function marketplace(){
        return $this->belongsTo('App\Model\tMarketplace', 'marketplace_id');
    }
}
