<?php

namespace App\Model;

use Jenssegers\Model\Model;
//use Illuminate\Database\Eloquent\Model;

class mSearch extends Model
{
    // protected $hidden = ['password'];

    protected $guarded = [];

    // protected $casts = ['age' => 'integer'];

    // public function save()
    // {
    //     return API::post('/items', $this->attributes);
    // }

    // public function setBirthdayAttribute($value)
    // {
    //     $this->attributes['birthday'] = strtotime($value);
    // }

    // public function getBirthdayAttribute($value)
    // {
    //     return new DateTime("@$value");
    // }

    // public function getAgeAttribute($value)
    // {
    //     return $this->birthday->diff(new DateTime('now'))->y;
    // }
}
