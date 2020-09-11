<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                Rule::unique('courses')->ignore($this->course),
            ],


            'content' => 'required|min:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Course name can't be empty",
            'name.min' => "Course name can't be less than 3 chars",
            'name.unique' => "Course name must be unique ",
            'content.required' => "Course content can't be empty",

        ];
    }
}
