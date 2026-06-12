<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitMeasureRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50|unique:unit_measures,name',
            'abbrevistion' => 'required|string|max:10|unique:unit_measures,abbrevistion',
            'description' => 'nullable|string|max:255',
        ];
    }
}
