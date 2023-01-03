import React,{useState,useEffect} from 'react';

export function CarEquipmentConfig({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>CarEquipmentConfig</h1>
        </div>
    )
}

export default CarEquipmentConfig;
