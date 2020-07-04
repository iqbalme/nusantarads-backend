<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Traits\queryTrait;
use App\Traits\shopeeTrait;
use App\Traits\lazadaTrait;
use App\Model\tAttribut;

class mainController extends Controller
{
    // use queryTrait;
    use shopeeTrait;
    use lazadaTrait;
    
    public $attributes = [];

    public function __construct(){
        $c_attribut = tAttribut::all();
        for($i=0;$i<count($c_attribut);$i++){
            $this->attributes[] = strtolower(str_replace(' ', '_', $c_attribut[$i]->nama_attribut));
        }        
    }

    public function search(Request $request){
        $request->request->add(['db_attribut' => $this->attributes]);
        // $response = $this->shopee_query($request);
        $response = $this->lazada_query($request);
        // $data = json_decode($response);
        // return $data->items[0]->name;

        return $response;
    }
}
