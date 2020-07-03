<?php

namespace App\Model;

use Jenssegers\Model\Model;
//use Illuminate\Database\Eloquent\Model;

class mSearch extends Model
{
    // protected $hidden = ['password'];

    protected $fillable = [
        'nama_seller',
        'url_seller',
        'penilaian_toko',
        'j_produk_seller',
        'chat_dibalas',
        'last_aktif',
        'bergabung',
        'follower',
        'nama_produk',
        'rating_produk',
        'j_penilaian_produk',
        'produk_terjual',
        'harga_before_diskon',
        'harga_after_diskon',
        'diskon',
        'stok',
        'array_rating_produk',
        'deskripsi_produk',
        'url_produk',
        'url_images',
        'seller_images',
        'is_grosir',
        'produk_thumbnail',
        'is_free_shipping',
        'store_location',
        'pre_order',
        'source'
    ];

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
