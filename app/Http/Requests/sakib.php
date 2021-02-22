<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sakib extends FormRequest
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
        return [
            /*'name'=>'required',
            'content'=>'required',
            'check'=>'required',
            'start_date'=>'required|confirmed',
            'end_date' => 'required|date|after:start_date'
            'email'=>'required|confirmed'*/
        ];

    }
  
    public function attributes()
    {
        return [
            'name' => 'Title',
        ];
    }
    public function messages()
    {
        return [
            'content.required'  => 'Content field puron kor',
        ];
    }


}
