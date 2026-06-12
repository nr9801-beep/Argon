<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:employees,email',
            'position' => 'required|string|min:3|max:100',
            'hire_date' => 'required|date',
            'carnet' => 'required|string|min:3|max:20|unique:employees,carnet',
            'status' => 'required|in:active,inactive',
        ];
    }
}
