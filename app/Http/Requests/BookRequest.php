<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:books',
            'slug' => 'required|string|unique:books',
            'publish_date' => 'required|date',
            'author' => 'required|string|max:50|min:3',
            'image' => 'required|image',
            'title' => 'required|string|max:25|min:5',
            'number_of_page' => 'required',
        ];
    }
}
