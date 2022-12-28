import React from 'react';
import {useState, useEffect} from "react";
import axios from "axios";

/**
 *
 * @param dataSource
 * @param data
 * @param role
 * @param setData
 * @returns {*}
 */
export function CarInfoDropDown({dataSource,data,role,setData}) {
        const[responseData,setResponseData]=useState([]);
        useEffect(()=>{
            axios.get(dataSource+"/"+data).then((response)=>{
                let result=Object.values(response.data);
                setResponseData(result);
            });
        },[data]);
        if(data === null){
            return(
                <>
                    <select name={role} id={role}>
                        <option value={null} selected>--wybierz {role}--</option>
                    </select>
                </>
            );
        }


        const handleSelect=(event)=>{
            setData(event.target.value);
        };

        return(

            <>
                <select name={role} id={role} onChange={handleSelect} >
                    <option value={null} selected>--wybierz {role}--</option>
                    {
                        responseData.length !== 0 && responseData.map((element) => {
                            return (<option value={element.name}>{element.name}</option>);
                        })
                    }
                </select>
            </>
        );
}
export default CarInfoDropDown;
