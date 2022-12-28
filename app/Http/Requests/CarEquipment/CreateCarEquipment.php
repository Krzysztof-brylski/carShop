<?php

namespace App\Http\Requests\CarEquipment;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarEquipment extends FormRequest
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
        //todo add unique rule
        return [
            "equipment"=>"required|string|unique:App\Models\CarEquipment,name|max:50"
        ];
    }
}
