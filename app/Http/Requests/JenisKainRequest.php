<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JenisKainRequest extends FormRequest
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
            $jenisKainRules = 'required|max:50|alpha_spaces|unique:jenis_kain,jenis_kain,'.$this->get('id');
        }else{
            $jenisKainRules = 'required|max:50|alpha_spaces|unique:jenis_kain,jenis_kain';
        }

        return [
            'jenis_kain'=>$jenisKainRules
        ];
    }
}
