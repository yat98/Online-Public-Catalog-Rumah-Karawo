<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKain extends Model
{
    protected $table = 'jenis_kain';

    protected $fillable = [
        'jenis_kain'
    ];

    public function produk(){
        return $this->hasMany('App\Produk','id_jenis_kain');
    }
}
