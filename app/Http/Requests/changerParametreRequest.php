<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class changerParametreRequest extends Request
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
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'old_psw' => '',
            'new_psw' => 'string|min:6|confirmed',
            'confirm_new_psw' => 'string|min:6|same:new_psw'
        ];
    }
}
