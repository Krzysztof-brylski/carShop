import React, {useRef} from 'react';
import {useState, useEffect} from "react";
import Multiselect from 'multiselect-react-dropdown';
import axios from "axios";

/**
 *
 * @param setData
 * @constructor
 */
export function CarEquipmentSelect({setCarEquipment}) {
    const [data,setData]=useState([]);
    const[control,setControl]=useState([]);


    useEffect(()=>{
        axios.get(CarEquipmentGateWay).then((res)=>{
            setData(res.data);
        });
    },[]);


    const paginatorStyle={
        display:"flex",
        justifyContent:"center",
        alignItems:"center",
        margin:"10px",
        padding:"10px",
        width:"35px",
        height:"35px",
        borderRadius:"10px",
        border:"1px solid #ddd",
        cursor:"pointer",
    };

    const handleSelect=(selectedList, selectedItem)=>{
        setCarEquipment(selectedList);
    };

    return(
        <div className="row h-25 overflowY-scroll w-100">
            {
                data.length !==0 &&
                <Multiselect
                    options={data}
                    onSelect={handleSelect}
                    onRemove={handleSelect}
                    displayValue="name"
                    style={{multiselectContainer:{width: "100%"}}}
                />
            }
        </div>
    )

}
export default CarEquipmentSelect;
