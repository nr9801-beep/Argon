<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name'=> 'required|string|max:50|unique:user_types,name',
            'description'=> 'required|string|max:255',
        ];
    }
}
