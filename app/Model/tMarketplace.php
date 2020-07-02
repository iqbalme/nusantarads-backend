<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tMarketplace extends Model
{
    protected $table = 't_marketplace';
    //public $timestamps = false;
    protected $guarded = [];

	public function tQuery(){
        return $this->hasMany('App\Model\tQuery', 'marketplace_id');
    }

    public function tqAttribut(){
        return $this->hasMany('App\Model\tqAttribut', 'marketplace_id');
    }
}
