<?php
namespace App\Services\Searching;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Builder;

class SearchingService{
    /**
     * @param array $data
     * @return Builder
     */
    public function applyFilters(array  $data){
        $query = Offer::query();

        /**carInfo*/
        if(isset($data['manufacturer'])){
            $query->where("carInfo.manufacturer",$data['manufacturer']);
        }
        if(isset($data['model'])){
            $query->where("carInfo.model",$data['model']);
        }
        if(isset($data['version'])){
            $query->where("carInfo.manufacturer",$data['version']);
        }
        /**details*/
        if(isset($data['engineSizeMin']) and isset($data['engineSizeMax'])){
            $query->whereBetween('details.engineSize',[$data['engineSizeMin'], $data['engineSizeMax']]);
        }
        if(isset($data['enginePowerMin']) and isset($data['enginePowerMax'])){
            $query->whereBetween('details.enginePower',[$data['enginePowerMin'], $data['enginePowerMax']]);
        }
        if(isset($data['productionYearMin']) and isset($data['productionYearMax'])){
            $query->whereBetween('productionYear',[$data['productionYearMin'], $data['productionYearMax']]);
        }
        if(isset($data['mileageMin']) and isset($data['mileageMax'])){
            $query->whereBetween('mileage',[$data['mileageMin'], $data['mileageMax']]);
        }
        if(isset($data['engineType'])){
            $query->whereBetween('details.engineType',$data['engineType']);
        }
        if(isset($data['transmission'])){
            $query->whereBetween('details.transmission',$data['transmission']);
        }
        /** price */
        if(isset($data['priceMin']) and isset($data['priceMax'])){
            $query->whereBetween('price',[$data['priceMin'], $data['priceMax']]);
        }
        /** offerType */
        if(isset($data['type'])){
            $query->where("type",$data['type']);
        }
        return $query;
    }
}
