<?php

namespace App\Http\Requests\Search;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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




            'productionYearMin'=>"nullable|min:$minDate|max:$maxDate",
            'productionYearMax'=>"nullable|min:$minDate|max:$maxDate",

            'mileageMin'=>'nullable|min:0|max:10000000',
            'mileageMax'=>'nullable|min:0|max:10000000',
            //todo add custom rule for engine type and transmission

            /** price */

            'priceMin'=>'nullable|min:0|max:10000000',
            'priceMax'=>'nullable|min:0|max:10000000',

        ];
    }
}
