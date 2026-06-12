<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name'=> 'required|string|max:50',
            'description'=> 'nullable|string|max:255',
            'preparation_time'=> 'required|integer|min:1',
            'status' => 'required|in:active,inactive',


        ];
    }
}
