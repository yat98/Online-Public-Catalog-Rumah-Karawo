<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'PUT'){
            $fotoProdukRules = 'sometimes|image|max:2000|mimes:jpeg,jpg,png,bmp';
        }else{
            $fotoProdukRules = 'required|image|max:2000|mimes:jpeg,jpg,png,bmp';
        }

        return [
            'nama_produk'=>'required|max:255|string',
            'harga'=>'required|numeric',
            'stok'=>'required|numeric',
            'detail_produk'=>'required|string',
            'foto_produk'=>$fotoProdukRules,
            'id_jenis_kain'=>'required|numeric',
            'id_kategori'=>'required|numeric',
        ];
    }
}
