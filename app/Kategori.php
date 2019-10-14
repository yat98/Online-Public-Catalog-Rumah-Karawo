<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Produk;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori'
    ];

    public function produk(){
        return $this->hasMany('App\Produk','id_kategori');
    }
}
