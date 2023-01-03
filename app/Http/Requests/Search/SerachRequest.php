<?php

namespace App\Http\Requests\Search;

use Illuminate\Foundation\Http\FormRequest;

class SerachRequest extends FormRequest
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
        return [
            /**carInfo*/

            'manufacturer'=>'nullable|exists:App\Models\CarManufacturer,name',
            'model'=>'nullable|exists:App\Models\CarModel,name',
            'version'=>'nullable|exists:App\Models\CarVersion,name',

            /**details*/

            'engineSizeMin'=>'nullable|integer|min:0|max:20000',
            'engineSizeMax'=>'nullable|integer|min:0|max:20000|gte:engineSizeMin',

            'enginePowerMin'=>'nullable|integer|min:0|max:2000',
            'enginePowerMax'=>'nullable|integer|min:0|max:2000|gte:enginePowerMin',

            'productionYearMin'=>"nullable|integer|min:$minDate|max:$maxDate",
            'productionYearMax'=>"nullable|integer|min:$minDate|max:$maxDate|gte:productionYearMin",

            'mileageMin'=>'nullable|integer|min:0|max:10000000',
            'mileageMax'=>'nullable|integer|min:0|max:10000000|gte:mileageMin',
            //todo add custom rule for engine type and transmission
            'engineType'=>'nullable|',
            'transmission'=>'nullable|',

            /** price */

            'priceMin'=>'nullable|min:0|integer|max:10000000',
            'priceMax'=>'nullable|min:0|integer|max:10000000|gte:priceMin',

            /** offerType */
            //todo custom rule for offer type (premium or standard)
            'type'=>'nullable|',
            /**paginate*/
            'paginate'=>"required"
        ];
    }
}
