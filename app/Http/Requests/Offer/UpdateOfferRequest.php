<?php

namespace App\Http\Requests\Offer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'price'=>'required|float|max:10',
            'description'=>'required|string|max:300',
            'localization'=>'required|string',
            'phone'=>'required|string|max:9|min:9',
            'email'=>'required|string|email',
            'images'=>'nullable|image',
        ];
    }
}
