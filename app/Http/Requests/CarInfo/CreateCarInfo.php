<?php

namespace App\Http\Requests\CarInfo;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarInfo extends FormRequest
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
        //todo make sure that all this data dont exist in db
        return [
            'manufacturer'=>"required|",
            'model'=>"required|",
            'type'=>"required|",
        ];
    }
}
