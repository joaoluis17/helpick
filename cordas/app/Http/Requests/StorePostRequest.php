<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:50|unique:posts,title',
            'content' => 'required|string|unique:posts,content',

        ];
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
    // public function messages(): array
    // {
    //     return [
    //         'title.unique' => 'o titulo precisa ser único',
    //     ];
    // }
}
