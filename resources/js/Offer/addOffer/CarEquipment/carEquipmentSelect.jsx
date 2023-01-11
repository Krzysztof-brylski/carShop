import React from 'react';
import {useState, useEffect} from "react";
import axios from "axios";

/**
 *
 * @param setData
 * @constructor
 */
export function CarEquipmentSelect({}) {
    const [dataSrc,setDataSrc]=useState(CarEquipmentGateWay);
    const [data,setData]=useState([]);
    const[control,setControl]=useState([]);
    useEffect(()=>{
        axios.get(dataSrc).then((res)=>{
            if(res.data.paginator.data.length !== 0){
                setData(res.data.paginator.data);
                setControl(res.data.paginator.links);
            }
        });
    },[dataSrc]);

    const changePage=(source)=>{
        if(source !== null){
            setDataSrc(source);
        }
    };
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

            <div className="d-flex justify-content-center">
                {control.map((element)=>{
                    return ( <span
                        style={paginatorStyle}
                        onClick={()=>changePage(element.url)}
                    >{element.label}</span>);
                })}
            </div>
        </div>
    )

}
export default CarEquipmentSelect;
