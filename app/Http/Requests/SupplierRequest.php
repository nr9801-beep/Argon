<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'contact_person' => 'required|string|min:3|max:100',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:suppliers,email',
            'address' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ];
    }
}
