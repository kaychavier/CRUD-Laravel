<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonRequest extends FormRequest
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
            'name'=> 'required|string|max:255',
            'cpf'=> 'required|cpf',
            'email'=> 'required|string|email|max:255',
            'password'=> 'required|string|max:255',
            'img'=> 'required|image',
            'type'=> 'required|string'
        ];
    }
}
