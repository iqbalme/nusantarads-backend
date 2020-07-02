<?php

namespace App\Traits;

trait blTrait
{
    function bl_query($q){
        $bl_q = 'https://api.bukalapak.com/multistrategy-products?prambanan_override=true&couriers[]=SiCepat+REG&couriers[]=J%26T+REG&free_shipping_provinces=0&installment=true&keywords=laptop+asus&provinces=Banten&deal=true&top_seller=true&brand=true&condition=used&price_range=1000:2000000&rating=3:5&limit=50&offset=0&page=1&facet=true&filter_non_popular_section=true&access_token=Z3m3PLVJrLlr6-brWH73cWyikIr6JK1dNMEytaK975Tn_w';
    }

}