import React,{useState,useEffect} from 'react';

export function OfferPrice({setOfferPrice}){
    const [price,setPrice]=useState(null);

    useEffect(()=>{
        setOfferPrice(price);
    },[price]);

    const handlePrice=(event)=>{
        setPrice(event.target.value);
    };
    return(
        <>
            <span>cena:</span>
            <input onChange={handlePrice} type="number"/>
        </>
    );
}
export default OfferPrice;
