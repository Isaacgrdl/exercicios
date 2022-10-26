<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required|min:3',
            'userName'=> 'required|min:3',
            'zipCode' => 'required|min:8|max:8',
            'email'=> ['required','email', Rule::unique('users')->ignore($this->id)],
            'password'=> ['required', Password::min(8)->letters()->numbers()]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Preencha o campo "Nome"',
            'name.min' => 'O campo "Nome" deve ser maior que :min',
            'userName.required' => 'Preencha o campo "Nome de Login"',
            'name.min' => 'O campo "Nome de Login" deve ser maior que :min',
            'zipCode.required' => 'Preencha o campo "CEP"',
            'zipCode.min' => 'O campo CEP deve conter :min números',
            'zipCode.max' => 'O campo CEP deve conter :max números',
            'email.required' => 'Preencha o campo "Email"',
            'email.email' => 'O campo "Email" deve conter um email válido',
            'email.unique' => "O E-mail já foi cadastrado.",
            'password.required' => 'Preencha o campo "Senha"',
            'password.min' => 'A senha precisa de no minímo 8 caracteres',
            'password.letters' => 'A senha precisa de pelo menos 1 letra',
            'password.numbers' => 'A senha precisa de pelo menos 1 número'
        ];
    }
}
