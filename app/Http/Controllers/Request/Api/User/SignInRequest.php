<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request\Api\User;

use App\Http\Controllers\Request\FormRequest;
use Illuminate\Validation\Rule;

final class SignInRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => 'required|string|max:255|email|' . Rule::exists('users', 'email'),
            'password' => 'required|string|min:8|max:255',
        ];
    }
}
