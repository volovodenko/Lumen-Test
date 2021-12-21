<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request\Api\User;

use App\Http\Controllers\Request\FormRequest;
use Illuminate\Validation\Rule;

final class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:3|max:255',
            'last_name'  => 'required|string|min:3|max:255',
            'phone'      => 'required|string|min:10|max:20',
            'email'      => 'required|string|max:255|email|' . Rule::unique('users', 'email'),
            'password'   => 'required|string|min:8|max:255|confirmed',
        ];
    }

    public function validated(): array
    {
        return $this->request->except('password_confirmation');
    }
}
