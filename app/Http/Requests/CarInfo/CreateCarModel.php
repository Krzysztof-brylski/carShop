<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarModel extends FormRequest
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
            "manufacturer"=>"string|exist:App\Models\CarManufacturer,name|max:50",
            "name"=>"string|unique:App\Models\CarModel,name|max:50"
        ];
    }
}
