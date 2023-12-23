<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'publisher' => ['required', 'string', 'min:3', 'max:50'],
            'isbn' => ['required', 'string', 'min:3', 'max:50'],
            'category' => ['required', 'string', 'min:3', 'max:100'],
            'sub_category' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string'],
            'pages' => ['required', 'integer', 'min:1'],
            'image' => ['required', 'string', 'min:1', 'max:200'],
            'added_by' => ['required', 'integer', 'min:1'],
            'created_at' => ['nullable', 'timestamp'],
            'updated_at' => ['nullable', 'timestamp'],
        ];
    }
}

