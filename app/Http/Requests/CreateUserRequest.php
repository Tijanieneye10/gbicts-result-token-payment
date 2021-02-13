<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
    public function rules(User $user)
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'school' => 'required',
            'role' => 'required',
            'phone' => 'required|numeric',
            'price' => 'required|numeric'
        ];
    }

    // Custome messages
    public function messages()
    {
        return [
            'name.required' => 'Firstname cant be empty',
            'email.email' => 'Email provided is not valid'
        ];
    }
}
