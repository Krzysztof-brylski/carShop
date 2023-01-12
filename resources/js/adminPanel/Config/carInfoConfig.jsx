import React,{useState,useEffect} from 'react';
import CarInfoDropDown from "../../Offer/addOffer/CarInfo/carInfoDropDown";
import {faPlus} from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import AddCarInfoModal from "./addCarInfoModal";
export function CarInfoConfig({currentIndex,index}) {
    if( currentIndex != index)return null;

    const [manufacturer,setManufacturer]=useState(null);
    const [model,setModel]=useState(null);
    const [version,setVersion]=useState(null);
    const[display,setDisplay]=useState(false);
    const [carInfoData,setCarInfoData]=useState({});
    const [allCarInfoData,setAllCarInfoData]=useState({});
    useEffect(()=>{
        setCarInfoData({
            "manufacturer":manufacturer,
            "model":model,
            "version":version,
        });
    },[manufacturer,model,version]);

    useEffect(()=>{
        axios.get("http://127.0.0.1:8000/carInfo",{params:setCarInfoData}).then((res)=>{
            console.log(res);
        });
    });

    const showModal=()=>{
        setDisplay(!display);
    };


    return (
        <div>

            <div className="d-flex align-items-center justify-content-between">
                <h1>Informacje o samochodach</h1>
            </div>
            <div className="row my-5">
                <div className="col-xl-4">
                    <h5>Producent Samochodu:</h5>
                    <CarInfoDropDown dataSource={ManufacturerGateWay} data={" "} role={"manufacturer"} setData={setManufacturer}/>
                    <button className="btn btn-success p-1 mx-3" disabled={manufacturer !== null} onClick={showModal}>
                        <FontAwesomeIcon icon={faPlus} size={"lg"} />
                    </button>
                </div>
                <div className="col-xl-4">
                    <h5>Model Samochodu:</h5>
                    <CarInfoDropDown dataSource={ModelGateWay} data={manufacturer} role={"model"} setData={setModel}/>
                    <button className="btn btn-success p-1 mx-3"  disabled={manufacturer===null || model !== null} onClick={showModal}>
                        <FontAwesomeIcon icon={faPlus} size={"lg"} />
                    </button>
                </div>
                <div className="col-xl-4">
                    <h5>Wersja Modelu Samochodu:</h5>
                    <CarInfoDropDown dataSource={VersionGateWay} data={model} role={"version"} setData={setVersion}/>
                    <button className="btn btn-success p-1 mx-3" disabled={model===null || version !== null} onClick={showModal}>
                        <FontAwesomeIcon icon={faPlus} size={"lg"}/>
                    </button>
                </div>
                <AddCarInfoModal display={display} setDisplay={setDisplay} data={carInfoData}/>

            </div>
        </div>
    )


}

export default CarInfoConfig;
