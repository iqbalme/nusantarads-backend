<?php

namespace App\Traits;

use App\Model\mSearch;
use App\Model\tQuery;
use App\Model\tMarketplace;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;

trait shopeeTrait
{
    function shopee_query($q){
        $query_info = tMarketplace::where('marketplace', 'shopee')->first()->tQuery()->first();
        $attribut_info = '';
        $attribut = '';
        for($i=0;$i<count($q->attribut);$i++){
            $c_attribut_id = DB::table('t_attribut')->where('nama_attribut', strtoupper(str_replace('_', ' ', key((array)$q->attribut[$i]))))->first()->id;
            $c_attribut_name = DB::table('t_q_attributes')->where(['marketplace_id' => $query_info->marketplace_id, 'attribut_id' => $c_attribut_id])->first()->attribute_query;
            $attribut .= '&'.$c_attribut_name.'='.current((array)$q->attribut[$i]);
        }
        $c_strcari_id = DB::table('t_attribut')->where('nama_attribut', 'KEYWORD')->first()->id;
        $strcari = DB::table('t_q_attributes')->where(['marketplace_id' => $query_info->marketplace_id, 'attribut_id' => $c_strcari_id])->first()->attribute_query;
        // $shopee_q = $query_info->api_host.$query_info->query.$attribut.'&'.$strcari.'='.urlencode($q->strcari);
        $shopee_q = 'https://shopee.co.id/api/v2/search_items/';
        // $shopee_q = 'https://shopee.co.id/api/v2/search_items/?by=relevancy&keyword='.$strcari.'&limit=100&newest=0&order=desc&page_type=search&version=2';
        // return $shopee_q;
        // die;
        // try{
        //     // if($query_info->method == 'GET'){
        //     //     $response = ['status' => 'success', 'data' => Curl::to($shopee_q)->asJson()->get()];
        //     // }
        // } catch(Exception $e){
        //     $response = ['status' => 'error', 'message' => $e];
        // }
        return response()->json(Curl::to($shopee_q)->withData( array( 'newest' => 0, 'limit' => 100, 'keyword' => 'baju+pria', 'by' => 'relevancy', 'order' => 'desc', 'page_type' => 'search', 'version' => 2 ) )
        ->withHeaders( array( 'user-agent : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'upgrade-insecure-requests: 1' ) )
        ->asJson()->get());
        // return $response;
        // die;
        // return response()->json($response);
    }

}