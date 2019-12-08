<?php

namespace Laravelroles\Rolespermissions\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
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
           
	    'name' => 'required',
	    'routes' => 'required',
	
	    
        ];
    }


	public function messages()
	{
	    return [
		
		'name.required' => trans('blah::translation.name.required'),
		'routes.required' => trans('blah::translation.routes.required'),
		
	    ];
	}
}