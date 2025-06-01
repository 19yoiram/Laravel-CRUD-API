<?php

namespace App\Http\Requests;

use App\Rules\TemplateEmail;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:60',
            'email' => ['required', 'email', 'unique:users', new TemplateEmail],
            'password' => 'required|confirmed',
            'age' =>  'required|integer|min:18',

            
        ];
    }
}
