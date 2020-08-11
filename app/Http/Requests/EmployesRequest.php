<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployesRequest extends Request
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
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'job' => 'required|string',
            'note' => 'required|string'
           
        ];
    }
}
