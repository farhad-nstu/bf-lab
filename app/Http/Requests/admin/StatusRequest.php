<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please enter status name'
        ];
    }
}
