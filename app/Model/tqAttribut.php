<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tqAttribut extends Model
{
    protected $table = 't_q_attributes';
    //public $timestamps = false;
    protected $guarded = [];

    public function marketplace(){
        return $this->belongsTo('App\Model\tMarketplace', 'marketplace_id');
    }

	public function attribut(){
        return $this->belongsTo('App\Model\tAttribut', 'attribut_id');
    }
}
