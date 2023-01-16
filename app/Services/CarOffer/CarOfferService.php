<?php
namespace  App\Services\CarOffer;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Models\Admin\OfferConfirmation;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\CarVersion;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Mongodb\Query\Builder;


class CarOfferService{
    /**
     * @param array $data
     */
    public function store(array $data){
        //todo saving images to storage

        $savedImages=array();
        foreach ($data['images'] as $image){
            array_push($savedImages,Storage::put('OfferImages',$image));
        }
        DB::transaction(function ()use($data,$savedImages){
            $offer=Offer::create([
                'status'=>'inactive',
                'type'=>'standard',
                'author'=>array(
                    "id"=>Auth::user()->id,
                    "email"=>$data['email'],
                    "number"=>$data['phone'],
                ),
                'details'=>array(
                    "engineSize"=>(int)$data['engineSize'],
                    "enginePower"=>(int)$data['carPower'],
                    "engineType"=>$data['engineType'],
                    "transmission"=>$data['transmission'],
                    "productionYear"=>(int)$data['productionYear'],
                    "mileage"=>(int)$data['mileage'],
                ),
                'carInfo'=>array(
                    "manufacturer"=>$data['manufacturer'],
                    "model"=>$data['model'],
                    "version"=>$data['version'],
                ),
                'equipment'=>$data['equipment'],
                'price'=>(int)$data['price'],
                'description'=>$data['description'],
                'localization'=>$data['localization'],
                'images'=>$savedImages,
            ]);
            OfferConfirmation::create(["offer_id"=>$offer->id]);
        });

    }

    /**
     * @param Offer $Offer
     * @param array $data
     */
    public function update(Offer $Offer, array $data){
        //todo test
        $savedImages=array();
        if(isset($data['images'])){
            foreach ($data['images'] as $image){
                array_push($savedImages,Storage::put('OfferImages',$image));
            }
            $data['images']=array_merge($Offer->images,$savedImages);
        }
        $Offer->update($data);
    }

    public function destroy(Offer $Offer){
        Storage::delete($Offer->images);
        $Offer->delete();
    }
    public function applyFilters(\Illuminate\Database\Query\Builder $builder, Array $filters){
        if(isset($filters['priceMin']) and isset($filters['priceMax'])){
            $builder=$builder->whereBetween('price',[(int)$filters['priceMin'], (int)$filters['priceMax']]);

        }if(isset($filters['productionYearMin']) and isset($filters['productionYearMax']) ){
            $builder=$builder->whereBetween('details.productionYear',[(int)$filters['productionYearMin'], (int)$filters['productionYearMax']]);

        }
        if(isset($filters['mileageMin']) and isset($filters['mileageMax']) ){
            $builder=$builder->whereBetween('details.mileage',[(int)$filters['mileageMin'], (int)$filters['mileageMax']]);

        }
        return $builder;

    }

    public function search($CarManufacturer, $CarModel, $CarVersion, array $data=[]){

        $CarManufacturer->name !=null ? $CarManufacturerResult = $CarManufacturer->where('name',$CarManufacturer->name)->pluck('name')->toArray():
            $CarManufacturerResult=$CarManufacturer->pluck('name')->all();

        $CarModel->name != null ?$CarModelResult=$CarModel->where('name',$CarModel->name)->pluck('name')->toArray():
            $CarModelResult=$CarManufacturer->carModels->pluck('name')->toArray();

        $CarVersion->name !=null ?$CarVersionResult=$CarVersion->where('name',$CarVersion->name)->pluck('name')->toArray():
            $CarVersionResult=$CarModel->carVersions->pluck('name')->toArray();

        $result=DB::connection("mongodb")->table("car_offer");

        if(count($CarManufacturerResult)!=0){
            $result=$result->whereIn('carInfo.manufacturer',$CarManufacturerResult);
        }if(count($CarModelResult)!=0){
            $result=$result->whereIn('carInfo.model',$CarModelResult);
        }if(count($CarVersionResult)!=0){
            $result=$result->whereIn('carInfo.version',$CarVersionResult);
        }
        $result=$this->applyFilters($result,$data);
        $result=$result->get(['carInfo'])->toArray();
        return $result;
    }
}
