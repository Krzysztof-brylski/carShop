<?php

namespace App\Http\Requests\Offer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
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
            'price'=>'required',
            'author'=>'required',
            'manufacturer'=>'required',
            'model'=>'required',
            'details'=>'nullable',
            'equipment'=>'nullable',
            'localization'=>'required',
        ];
    }
}
