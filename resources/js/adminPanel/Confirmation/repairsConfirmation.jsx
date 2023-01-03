import React,{useState,useEffect} from 'react';

export function RepairsConfirmation({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>RepairsConfirmation</h1>
        </div>
    )
}

export default RepairsConfirmation;
