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
            'email' => 'required|max:255|email',
			'name' => 'required',
			'password' => 'confirmed',
            'roles' => 'required',
	    
        ];
    }


	public function messages()
	{
	    return [
			'email.required' => trans('lang::translation.email.required'),
			'email.max'     => trans('lang::translation.email.max'),
			'email.email'     => trans('lang::translation.email.email'),
			'name.required' => trans('lang::translation.name.required'),
			'roles.required' => trans('lang::translation.roles.required'),
			'password.confirmed' => trans('lang::translation.password.confirmed'),
	    ];
	}
}
