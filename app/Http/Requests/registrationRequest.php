<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registrationRequest extends FormRequest
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
            'name'=>'required',
            'slug'=>'nulable',
            'number'=>'required',
            'email'=>'required|email|unique:registrations',
            'password'=>'required|confirmed|min:6',
            'isApprove'=>'nullable',
            'isFoodDelar'=>'nullable',
            'isPlaceUploder'=>'nullable',
            'district_id'=>'nullable',
            'category_id'=>'nullable',

        ];
    }
}
