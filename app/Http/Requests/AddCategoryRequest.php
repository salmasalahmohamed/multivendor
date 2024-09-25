<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:255|unique:categories,name,'.$this->route('category'),
            'parent_id'=>'nullable|int|exists:categories,id',
            'logo'=>'mimes:png,jpg,jpeg',
            'status'=>'in:active,archived',
            'description'=>['nullable',new Filter()],
        ];
    }
}
