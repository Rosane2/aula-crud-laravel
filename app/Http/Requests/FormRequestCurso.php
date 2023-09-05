<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestCursos extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {

        //$request = [];
       // if($this->method() == 'POST') {
            $request =  [
                'nomecurso' => 'required',
                'cargahoraria' => 'required'
            ];
        //}
        
        return $request;
    }
}
