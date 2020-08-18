<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AjouterPromotionRequest extends Request
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
            'titre' => 'max:255|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'pourcentage' => 'required|integer',
            'produit' => 'required'
        ];
    }
}
