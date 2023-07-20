<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQrCodeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'body' => 'required|string',
            'eye' => 'required|string',
            'eyeBall' => 'required|string',
            'bgColor' => 'required|string',
            'gradientColor1' => 'required|string',
            'gradientColor2' => 'required|string',
            'gradientType' => 'required|string',
            'eyeColor' => 'required|string',
            'eyeBallColor' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

    }
}
