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
            'email' => 'required|unique:users|max:255|email',
			'name' => 'required',
			'roles' => 'required',
        ];
    }


	public function messages()
	{
	    return [
			'email.required' => trans('lang::translation.email.required'),
			'email.unique'  => trans('lang::translation.email.unique'),
			'email.email'     => trans('lang::translation.email.email'),
			'email.max'     => trans('lang::translation.email.max'),
			'name.required' => trans('lang::translation.name.required'),
			'password.confirmed' => trans('lang::translation.password.confirmed'),
			'roles.required' => trans('lang::translation.roles.required'),
	    ];
	}
}
