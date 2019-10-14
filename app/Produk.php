<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    
    protected $fillable = [
        'nama_produk',
        'stok',
        'harga',
        'detail_produk',
        'foto_produk',
        'id_jenis_kain',
        'id_kategori',
    ];

    public function kategori(){
        return $this->belongsTo('App\Kategori','id_kategori');
    }
    
    public function jenisKain(){
        return $this->belongsTo('App\JenisKain','id_jenis_kain');
    }

}
