<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class clientRequest extends Request
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
     * 
     *  'full_name' => 'required|string',
            *'phone' => 'required|string',
            *'budget' => 'required|integer',
            *'section' => 'required|string',
            *'email' => 'required|email',
            *'location' => 'required|string',
            *'zip' => 'required|string',
            *'city' => 'required|string',
            *'country' => 'required|string'
     */
    public function rules()
    {
        return [
            'full_name' => 'required|string',
            'phone' => 'required|string',
            
            'email' => 'required|email',
           
            'zip' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string'
           
        ];
    }
}
