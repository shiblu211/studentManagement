<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'number' => ['required'],
            'department_id' => ['required', 'integer'],
            'photo' => ['required'],
            'guardian_number' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
