<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request\Api\User;

use App\Http\Controllers\Request\FormRequest;

final class AddCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'       => 'required|string|min:3|max:255',
            'phone'       => 'required|string|min:10|max:20',
            'description' => 'required|string|min:3|max:255',
        ];
    }
}
