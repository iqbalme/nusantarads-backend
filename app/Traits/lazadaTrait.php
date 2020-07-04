<?php

namespace App\Traits;

use App\Model\mSearch;
use App\Model\tQuery;
use App\Model\tMarketplace;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

trait lazadaTrait
{
    function lazada_query($q){
    // $query_info = tMarketplace::where('marketplace', 'shopee')->first()->tQuery()->first();
        // $attribut_info = '';
        // $attribut = '';
        // for($i=0;$i<count($q->attribut);$i++){
        //     $c_attribut_id = DB::table('t_attribut')->where('nama_attribut', strtoupper(str_replace('_', ' ', key((array)$q->attribut[$i]))))->first()->id;
        //     $c_attribut_name = DB::table('t_q_attributes')->where(['marketplace_id' => $query_info->marketplace_id, 'attribut_id' => $c_attribut_id])->first()->attribute_query;
        //     $attribut .= '&'.$c_attribut_name.'='.current((array)$q->attribut[$i]);
        // }
        // $c_strcari_id = DB::table('t_attribut')->where('nama_attribut', 'KEYWORD')->first()->id;
        // $strcari = DB::table('t_q_attributes')->where(['marketplace_id' => $query_info->marketplace_id, 'attribut_id' => $c_strcari_id])->first()->attribute_query;
        // $shopee_q = $query_info->api_host.$query_info->query.$attribut.'&'.$strcari.'='.urlencode($q->strcari);

        // try{
        //     // if($query_info->method == 'GET'){
        //     //     $response = ['status' => 'success', 'data' => Curl::to($shopee_q)->asJson()->get()];
        //     // }
        // } catch(Exception $e){
        //     $response = ['status' => 'error', 'message' => $e];
        // }
        $list_produk = [];
        
        //for testing
        // $path = storage_path() . '/json/shopee_search.json'; // ie: /var/www/laravel/app/storage/json/filename.json
        // $data = json_decode(file_get_contents($path), true);
        
        //for production
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://www.lazada.co.id/catalog/?ajax=true&from=search_history&page=2&q=alat%20terapi&rating=5');
        $data = json_decode($response->getBody(), true);
        $list_item = $data['mods']['listItems'];
        return $list_item;
        for($i=0;$i<count($list_item);$i++){
            $t_data = [
                'itemid' => $list_item[$i]['itemid'],
                'shopid' => $list_item[$i]['shopid'],
            ];
            $list_produk[] = $this->lazada_process_model($t_data);
        }
        return $list_produk;
    }

    private function lazada_process_model($data){
        $itemid = $data['itemid'];
        $shopid = $data['shopid'];
        $c_produk = Curl::to('https://shopee.co.id/api/v2/item/get?itemid='.$itemid.'&shopid='.$shopid)
        ->get();
        $s_produk = Curl::to('https://shopee.co.id/api/v2/shop/get?shopid='.$shopid)
        ->get();
        $c_data = json_decode($c_produk,true)['item'];
        $s_data = json_decode($s_produk,true)['data'];
        $temp_images = [];
        for($i=0;$i<count($c_data['images']);$i++){
            $temp_images[] = 'https://cf.shopee.co.id/file/'.$c_data['images'][$i];
        }
        $temp_data = new mSearch([
                'nama_seller' => $s_data['name'],
                'url_seller' => 'https://shopee.co.id/'.$s_data['account']['username'],
                'penilaian_toko' => $s_data['rating_star'],
                'j_produk_seller' => $s_data['item_count'],
                'chat_dibalas' => $s_data['response_rate'].'%',
                'last_aktif' => $s_data['last_active_time'],
                'bergabung' => $s_data['ctime'],
                'follower' => $s_data['follower_count'],
                'nama_produk' => $c_data['name'],
                'rating_produk' => $c_data['item_rating']['rating_star'],
                'j_penilaian_produk' => $c_data['item_rating']['rating_count'][0],
                'produk_terjual' => $c_data['historical_sold'],
                'harga_before_diskon' => $c_data['price_before_discount'],
                'harga_after_diskon' => $c_data['price'],
                'diskon' => $c_data['discount'],
                'stok' => $c_data['stock'],
                'array_rating_produk' => [
                    $c_data['item_rating']['rating_count'][1],
                    $c_data['item_rating']['rating_count'][2],
                    $c_data['item_rating']['rating_count'][3],
                    $c_data['item_rating']['rating_count'][4],
                    $c_data['item_rating']['rating_count'][5]
                ],                
                'deskripsi_produk' => $c_data['description'],
                'url_produk' => 'https://shopee.co.id/'.str_replace(' ', '-', $c_data['name']).'-i.'.$shopid.'.'.$itemid,
                'url_images' => $temp_images,
                'seller_images' => 'https://cf.shopee.co.id/file/'.$s_data['account']['portrait'].'_tn',
                'is_grosir' => $c_data['can_use_wholesale'],
                'produk_thumbnail' => 'https://cf.shopee.co.id/file/'.$c_data['image'].'_tn',
                'is_free_shipping' => $c_data['show_free_shipping'],
                'store_location' => $s_data['shop_location'],
                'pre_order' => $c_data['is_pre_order'],
                'source' => 'shopee'
            ]);
        return $temp_data;
    }

}