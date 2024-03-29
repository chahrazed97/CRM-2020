<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventUpdateRequest extends Request
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
        $id = $this->event;
		return [
			'event_name' => 'required|max:255' . $id,
            'start_date' => 'required' . $id,
            'end_date' => 'required' . $id
		];
    }
}
