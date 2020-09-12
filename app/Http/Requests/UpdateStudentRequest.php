<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($this->student),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Student name is required",
            'name.min' => "Student name can't be less than 3 chars",
            'name.string' => "Student name must be String ",
            'email.required' => "Stdent mail is required",
            'email.unique' => "Email already exist",
        ];
    }
}
