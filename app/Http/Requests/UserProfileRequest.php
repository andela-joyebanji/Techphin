<?php

namespace Pyjac\Techphin\Http\Requests;

class UserProfileRequest extends Request
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
            'username'  => 'required|max:255|unique:users,username,'.auth()->user()->id,
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'image'     => 'image|max:10240'
            'email'     => 'required|email|max:255|unique:users,email,'.auth()->user()->id,
        ];
    }
}
