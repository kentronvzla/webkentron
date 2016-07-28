<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistrationFormRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required_without:id|min:8|confirmed',
            'password_confirmation' => 'required_with:password|min:8',
            'first_name' => 'required|alpha|max:100',
            'last_name' => 'required|alpha|max:100',
        ];
    }

}
