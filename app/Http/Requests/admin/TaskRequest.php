<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required',
            'status_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Please enter title',
            'status_id.required'=>'Please select a status',
        ];
    }
}
