<?php

namespace Laravelroles\Rolespermissions\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required|max:255',
	    'name' => 'required',
            'roles' => 'required',
	    
        ];
    }


	public function messages()
	{
	    return [
		'email.required' => trans('blah::translation.email.required'),
		'email.max'     => trans('blah::translation.email.max'),
		'name.required' => trans('blah::translation.name.required'),
		'roles.required' => trans('blah::translation.roles.required'),
	    ];
	}
}
