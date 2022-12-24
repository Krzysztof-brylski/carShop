<?php

namespace App\Http\Requests\Offer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateOfferRequest extends FormRequest
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
        //todo make sure  that manufacturer, model, type and equipment. exist in db!
        //exist:car_manufacturer,
        return [
            'price'=>'required|float|max:10',
            'manufacturer'=>'required|string',
            'model'=>'required|string',
            'version'=>'required|string',
            'description'=>'required|string|max:300',
            'equipment'=>'required',
            'localization'=>'required|string',
            'images'=>'required|image',
            'repairs'=>'nullable',
        ];
    }
}
