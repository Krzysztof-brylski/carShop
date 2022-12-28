import React from 'react';
import {useState,useEffect} from "react";
import CarInfoDropDown from "./carInfoDropDown";

/**
 *
 * @param setCarInfo
 * @returns {*}
 * @constructor
 */
export function CarInfoInput({setCarInfo}) {

    const [manufacturer,setManufacturer]=useState(null);
    const [model,setModel]=useState(null);
    const [version,setVersion]=useState(null);
    useEffect(()=>{
        if(manufacturer !== null && model !== null && version !== null){
            setCarInfo({
                "manufacturer":manufacturer,
                "model":model,
                "version":version,
            });
        }
    },[manufacturer,model,version]);
    useEffect(()=>{
        setModel(null);
    },[manufacturer]);
    return(
        <div className="d-flex flex-row w-50">
            <CarInfoDropDown dataSource={ManufacturerGateWay} data={" "} role={"manufacturer"} setData={setManufacturer}/>
            <CarInfoDropDown dataSource={ModelGateWay} data={manufacturer} role={"model"} setData={setModel}/>
            <CarInfoDropDown dataSource={VersionGateWay} data={model} role={"version"} setData={setVersion}/>
        </div>
    );

}
export default CarInfoInput;
