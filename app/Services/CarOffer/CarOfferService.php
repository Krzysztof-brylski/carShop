<?php
namespace  App\Services\CarOffer;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        Offer::create([
            'status'=>'inactive',
            'type'=>'standard',
            'author'=>array(
               "id"=>Auth::user()->id,
                "email"=>$data['email'],
                "number"=>$data['phone'],
            ),
            'details'=>array(
                "engineSize"=>$data['engineSize'],
                "enginePower"=>$data['carPower'],
                "engineType"=>$data['engineType'],
            ),
            'carInfo'=>array(
                "manufacturer"=>$data['manufacturer'],
                "model"=>$data['model'],
                "version"=>$data['version'],
            ),
            'price'=>$data['price'],
            'description'=>$data['description'],
            'localization'=>$data['localization'],
            'images'=>$savedImages,
        ]);
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
}
