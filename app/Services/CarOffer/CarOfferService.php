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
        $offer = Offer::create([
            'author'=>Auth::user()->id,
            'status'=>'inactive',
            'type'=>'standard',


            'price'=>$data['price'],
            'manufacturer'=>$data['manufacturer'],
            'model'=>$data['model'],
            'version'=>$data['version'],
            'description'=>$data['description'],
            'equipment'=>$data['equipment'],
            'localization'=>$data['localization'],
            'repairs'=> (!isset($data['repairs'])?null: $data['repairs']),
            'images'=>$savedImages,
        ]);
        $offer->save();
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
