<?php

namespace App\Traits;

trait lazadaTrait
{
    function lazada_query($q){
        $lazada_q = 'https://www.lazada.co.id/catalog/?ajax=true&from=search_history&page=2&q=alat%20terapi&rating=5';
    }

}