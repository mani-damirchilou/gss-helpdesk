<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login' => ['required','string',"exists:users,{$this->loginKey()}"],
            'password' => ['required','string'],
            'remember' => ['bool']
        ];
    }

    private function loginKey(): string
    {
        return filter_var($this->input('login'),FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }
}
