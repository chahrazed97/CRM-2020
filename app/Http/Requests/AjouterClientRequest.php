<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AjouterClientRequest extends Request
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
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'date_naissance' => 'date',
            'adresse' => 'string',
            'payes' => 'string',
            'code_postal' => 'integer',
            'metier' => 'string'
        ];
    }
}
