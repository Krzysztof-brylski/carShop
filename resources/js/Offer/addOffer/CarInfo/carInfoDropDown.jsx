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
            if(data !== null){
                axios.get(dataSource+"/"+data).then((response)=>{
                    let result=Object.values(response.data);
                    setResponseData(result);
                });
                document.querySelector(`#${role}`).value="null";
            }
        },[data]);
        if(data === null){
            console.log('xd');
            return(
                <>
                    <select name={role} id={role} disabled style={{cursor:"not-allowed"}}>
                        <option value={null} selected>--wybierz {role}--</option>
                    </select>
                </>
            );
        }


        const handleSelect=(event)=>{
            let value=event.target.value;
            value === "null" ? setData(null) : setData(value);

        };

        return(

            <>
                <select name={role} id={role} onChange={handleSelect} defaultValue={"null"} >
                    <option value={"null"} selected={true}>--wybierz {role}--</option>
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
