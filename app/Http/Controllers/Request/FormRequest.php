<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

// "Template Method" pattern
abstract class FormRequest extends BaseController
{
    public function __construct(
        protected Request $request,
    ) {
        $this->validate($request, $this->rules());
    }

    public function validated(): array
    {
        return $this->request->all();
    }

    abstract public function rules(): array;
}
