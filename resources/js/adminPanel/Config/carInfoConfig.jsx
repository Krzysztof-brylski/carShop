import React,{useState,useEffect} from 'react';

export function CarInfoConfig({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>CarInfoConfig</h1>
        </div>
    )
}

export default CarInfoConfig;
