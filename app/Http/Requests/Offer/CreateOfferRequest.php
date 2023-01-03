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
        $minDate=date("Y",strtotime('-80 year'));
        $maxDate=date("Y");
        //todo make sure all selected equipment exist in db!
        return [
            'price'=>'required|max:10',
            'manufacturer'=>'required|string|exists:App\Models\CarManufacturer,name|max:50',
            'model'=>'required|string|exists:App\Models\CarModel,name|max:50',
            'version'=>'required|string|exists:App\Models\CarVersion,name|max:50',
            'description'=>'required|string|max:200',
            'carPower'=>'required|integer|min:0|max:2000',
            'engineSize'=>'required|integer|min:0|max:20000',
            'mileage'=>'required|min:0|max:10000000',
            'productionYear'=>"required|integer|min:$minDate|max:$maxDate",
            'images'=>'required',
            'images.*'=>'file|image',
            //todo add custom rule for engine type and transmission
            'engineType'=>'required|string',
            'transmission'=>'required|string',
            //'equipment'=>'required',
            //'equipment.*'=>'exists:App\Models\CarEquipment, name|max:50',
            'phone'=>'required|string|max:9|min:9',
            'email'=>'required|string|email',
            'localization'=>'required|string',
            'repairs'=>'nullable',
        ];
    }
}
