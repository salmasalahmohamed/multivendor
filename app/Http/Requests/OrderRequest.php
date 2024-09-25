<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'addr.*.first_name'=>'required|string',
            'addr.*.last_name'=>'required|string',
            'addr.*.email'=>'required',
            'addr.*.phone_number'=>'required',
            'addr.*.street_address'=>'required',
            'addr.*.postal_code'=>'required',
            'addr.*.city'=>'required',
            'addr.*.country'=>'required',
            'addr.*.state'=>'required',


        ];
    }
}
