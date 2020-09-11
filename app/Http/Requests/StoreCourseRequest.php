<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'name' => 'required|unique:courses|min:3',
            'content' => 'required|min:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Course name can't be empty",
            'name.min' => "Course name can't be less than 3 chars",
            'Course .unique' => "Course name must be unique ",
            'content.required' => "Course content can't be empty",
        ];
    }
}
