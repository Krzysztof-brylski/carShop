import React,{useState} from 'react';
import ReactDOM from "react-dom";
import CarImagesDropDown from  "./CarImages/carImagesDropDown"
import CarInfoInput from "./CarInfo/carInfoInput"
import CarEquipmentSelect from "./CarEquipment/carEquipmentSelect";
import OfferAuthorContactInput from "./OfferAuthorContact/offerAuthorContactInput";
import LocalizationInput from "./Localization/localizationInput";
import OfferDescription from "./OfferDescription/offerDescriptionInput";
import OfferPrice from "./OfferPrice/offerPrice";
import CarDetailsInput from "./CarDetails/carDetailsInput";
/**
 *
 * @returns {*}
 */
function AddOffer() {

    const [carInfo,setCarInfo]=useState(null);
    const [carImages,setCarImages]=useState(null);
    const [carEquipment,setCarEquipment]=useState(null);
    const [carDetails,setCarDetails]=useState(null);
    const [offerContact,setOfferContact]=useState(null);
    const [offerDescription,setOfferDescription]=useState(null);
    const [offerLocalization,setOfferLocalization]=useState(null);
    const [offerPrice,setOfferPrice]=useState(null);
    const  createOffer=()=>{
        let formData = new FormData();
        formData.append("_token",crsfToken);
        formData.append("manufacturer",carInfo.manufacturer);
        formData.append("model",carInfo.model);
        formData.append("version",carInfo.version);
        formData.append("description",offerDescription);
        carImages.map((image)=>{
            formData.append("images[]",image);
        });
        carEquipment.map((element)=>{
            formData.append("equipment[]",element.name);
        });
        formData.append("carPower",carDetails.enginePower);
        formData.append("engineSize",carDetails.engineSize);
        formData.append("engineType",carDetails.fuel);
        formData.append("transmission",carDetails.transmission);
        formData.append("productionYear",carDetails.productionYear);
        formData.append("mileage",carDetails.mileage);
        formData.append("phone",offerContact.phone);
        formData.append("email",offerContact.email);

        formData.append("localization",offerLocalization);
        formData.append("price",offerPrice);
        axios.post(CreateOfferGateWay,formData).then(()=>{
            //todo show success modal
        }).catch(()=>{
            //todo show error modal
        });

    };
    console.log(carImages);
    // 3dropDown drag-n-drop equipment carDetails contact description localization price & ?currency?
    return(
        <div className="d-flex flex-column justify-content-center align-items-center">

            <div className="my-2">
                <CarInfoInput setCarInfo={setCarInfo} />
            </div>
            <div  >
                <CarImagesDropDown setCarImages={setCarImages}/>
            </div>
            <div className="my-2">
                <CarEquipmentSelect setCarEquipment={setCarEquipment} />
            </div>
            <div className="my-2">
                <CarDetailsInput setCarDetails={setCarDetails} />
            </div>
            <div className="my-2">
                <OfferAuthorContactInput setOfferContact={setOfferContact}/>
            </div>
            <div className="my-2">
                <OfferDescription setOfferDescription={setOfferDescription}/>
            </div>
            <div className="my-2">
                <LocalizationInput setOfferLocalization={setOfferLocalization} />
            </div>
            <div className="my-2">
                <OfferPrice setOfferPrice={setOfferPrice}/>
            </div>
            <button className="btn btn-primary my-2" onClick={createOffer} >Dodaj ogłoszenie</button>
        </div>
    );
}
ReactDOM.render(<AddOffer/>,document.querySelector('#addOffer'));
