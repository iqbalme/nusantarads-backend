<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Traits\queryTrait;
use App\Traits\shopeeTrait;
use App\Model\tAttribut;

class mainController extends Controller
{
    // use queryTrait;
    use shopeeTrait;
    
    public $attributes = [];

    public function __construct(){
        $c_attribut = tAttribut::all();
        for($i=0;$i<count($c_attribut);$i++){
            $this->attributes[] = strtolower(str_replace(' ', '_', $c_attribut[$i]->nama_attribut));
        }        
    }

    public function search(Request $request){
        $request->request->add(['db_attribut' => $this->attributes]);
        $response = $this->shopee_query($request);
        return $response;
    }
}
