import React,{useState,useEffect} from 'react';

export function OfferConfirmation({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>OfferConfirmation</h1>
        </div>
    )
}

export default OfferConfirmation;
