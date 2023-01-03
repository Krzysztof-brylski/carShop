import React,{useState,useEffect} from 'react';

export function ReportsConfirmation({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>ReportsConfirmation</h1>
        </div>
    )
}

export default ReportsConfirmation;
