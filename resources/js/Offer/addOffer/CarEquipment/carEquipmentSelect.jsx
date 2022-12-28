import React from 'react';
import {useState, useEffect} from "react";
import axios from "axios";

/**
 *
 * @param setData
 * @constructor
 */
export function CarEquipmentSelect({}) {
    const [data,setData]=useState([]);
    useEffect(()=>{
        axios.get(CarEquipmentGateWay).then((response)=>{
            setData(Object.values(response.data))
        });
    },[]);
    return(
        <div className="row h-25 overflowY-scroll">
            {
                data.map((element)=>{
                    return(
                        <div className="col-xl-6">
                            <input type="checkbox"/>
                            <span className="mx-2">{element.name}:</span>
                        </div>
                        );
                })
            }
        </div>
    )

}
export default CarEquipmentSelect;
