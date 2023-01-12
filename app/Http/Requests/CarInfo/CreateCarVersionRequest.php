<?php

namespace App\Http\Requests\CarInfo;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarVersionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "model"=>"string|exists:App\Models\CarModel,name|max:50",
            "version"=>"string|unique:App\Models\CarVersion,name|max:50"
        ];
    }
}
