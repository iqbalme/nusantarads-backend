<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blController extends Controller
{
    //https://api.bukalapak.com/multistrategy-products?prambanan_override=true&keywords=laptop+asus&rating=4:5&limit=50&offset=50&page=2&facet=true&filter_non_popular_section=true&access_token=Z3m3PLVJrLlr6-brWH73cWyikIr6JK1dNMEytaK975Tn_w
    //GET

    //https://api.bukalapak.com/multistrategy-products?prambanan_override=true&couriers[]=SiCepat+REG&couriers[]=J%26T+REG&free_shipping_provinces=0&installment=true&keywords=laptop+asus&provinces=Banten&deal=true&top_seller=true&brand=true&condition=used&price_range=1000:2000000&rating=3:5&limit=50&offset=0&page=1&facet=true&filter_non_popular_section=true&access_token=Z3m3PLVJrLlr6-brWH73cWyikIr6JK1dNMEytaK975Tn_w

    // access_token ambil dari localstorage bl_token 
    //ex: localStorage.setItem('bl_token', '{"access_token":"i43xevedsbxJAkXEi7mhrNuL_-F6ZbZj89Cy8XpL-uQ2Ag","created_at":1593321849,"expires_in":11700,"expires_at":1593333549000,"refresh_token":null,"scope":"public","token_type":"bearer","user_id":null}');
}
