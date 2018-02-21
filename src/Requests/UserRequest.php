<?php

namespace Laravelroles\Rolespermissions\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|unique:users|max:255',
	    'name' => 'required',
	    'password' => 'required|confirmed',
	    'roles' => 'required',
	
	    
        ];
    }


	public function messages()
	{
	    return [
		'email.required' => trans('blah::translation.email.required'),
		'email.unique'  => trans('blah::translation.email.unique'),
		'email.max'     => trans('blah::translation.email.max'),
		'name.required' => trans('blah::translation.name.required'),
		'password.required' => trans('blah::translation.password.required'),
		'roles.required' => trans('blah::translation.roles.required'),
	    ];
	}
}
