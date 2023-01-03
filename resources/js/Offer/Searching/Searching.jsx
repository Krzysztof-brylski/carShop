import React,{useState} from 'react';
import ReactDOM from "react-dom";
import CarInfoDropDown from "../addOffer/CarInfo/carInfoDropDown";




export function OfferSearching() {

    const [manufacturer,setManufacturer]=useState(null);
    const [model,setModel]=useState(null);
    const [version,setVersion]=useState(null);
    const [price,setPrice]=useState({});
    const [productionYear,setProductionYear]=useState({});
    const [mileage,setMileage]=useState({});
    return(
        <div className="row">
            <h3>Powiedz nam jakiego auta szukasz</h3>
            <div className="col-xl-6">
                <span>Marka samochodu</span>
                <CarInfoDropDown dataSource={ManufacturerGateWay} data={" "} role={"manufacturer"} setData={setManufacturer}/>
            </div>
            <div className="col-xl-6">
                <span>Model samochodu</span>
                <CarInfoDropDown dataSource={ModelGateWay} data={manufacturer} role={"model"} setData={setModel}/>
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
            <button className="btn btn-primary w-25">Szukaj</button>
        </div>
    );


}
ReactDOM.render(<OfferSearching/>,document.querySelector('#offerSearching'));
