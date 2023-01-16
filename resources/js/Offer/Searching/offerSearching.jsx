import React,{useState} from 'react';
import ReactDOM from "react-dom";
import CarInfoDropDown from "../addOffer/CarInfo/carInfoDropDown";




export function OfferSearching() {

    const [manufacturer,setManufacturer]=useState(null);
    const [model,setModel]=useState(null);
    const [version,setVersion]=useState(null);
    const [priceMin,setPriceMin]=useState(0);
    const [priceMax,setPriceMax]=useState(100000000);
    const [productionYearMin,setProductionMinYear]=useState(1980);
    const [productionYearMax,setProductionMaxYear]=useState(2023);
    const [mileageMin,setMileageMin]=useState(0);
    const [mileageMax,setMileageMax]=useState(100000000);
    const handle=()=>{
        let params=`priceMin=${priceMin}&priceMax=${priceMax}
        &productionYearMin=${productionYearMin}&productionYearMax=${productionYearMax}
        &mileageMin=${mileageMin}&mileageMax=${mileageMax}
        `;
        let url = `search/${manufacturer}/${model}/${version}/?`+params;
        window.location.href = url;
    };

    return(
        <div className="row justify-content-center p-2 m-5 bg-white rounded">
            <h3>Powiedz nam jakiego auta szukasz</h3>
            <div className="col-xl-6">
                <span>Marka samochodu</span>
                <CarInfoDropDown dataSource={ManufacturerGateWay} data={" "} role={"manufacturer"} setData={setManufacturer} setNextField={setModel} />
            </div>
            <div className="col-xl-6">
                <span>Model samochodu</span>
                <CarInfoDropDown dataSource={ModelGateWay} data={manufacturer} role={"model"} setData={setModel} setNextField={setVersion}/>
            </div>
            <div className="col-xl-6">
                <span>Wersja samochodu</span>
                <CarInfoDropDown dataSource={VersionGateWay} data={model} role={"version"} setData={setVersion}/>
            </div>
            <div className="col-xl-6">
                <span>Cena</span>
                <div>
                    <select>
                        <option>Od</option>
                    </select>
                    <select>
                        <option>Do</option>
                    </select>
                </div>
            </div>
            <div className="col-xl-6">
                <span>Rok produkcji</span>
                <div>
                    <select>
                        <option>Od</option>
                    </select>
                    <select>
                        <option>Do</option>
                    </select>
                </div>
            </div>
            <div className="col-xl-6">
                <span>Przebieg</span>
                <div>
                    <select>
                        <option>Od</option>
                    </select>
                    <select>
                        <option>Do</option>
                    </select>
                </div>
            </div>
            <button className="btn btn-primary w-25" onClick={handle}>Szukaj</button>
        </div>
    );


}

