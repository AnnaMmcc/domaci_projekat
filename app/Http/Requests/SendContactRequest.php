<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendContactRequest extends FormRequest
{
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
            "email"=> "required|string",
            "subject" => "required|string",
            "message" => "string|min:5|max:255"
        ];
    }
}
