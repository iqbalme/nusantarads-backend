<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tAttribut extends Model
{
    protected $table = 't_attribut';
    //public $timestamps = false;
    protected $guarded = [];

	public function tqAttribut(){
        return $this->hasMany('App\Model\tqAttribut', 'attribut_id');
    }
}
