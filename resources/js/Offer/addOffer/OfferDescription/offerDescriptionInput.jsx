import React, {useEffect, useState} from 'react';

export function OfferDescription({setOfferDescription}){
    const [description,setDescription]=useState(null);

    useEffect(()=>{
        if(description !== null ){
            setOfferDescription(
                description
            );
        }
    },[description]);
    const handleDescription=(event)=>{
        setDescription(event.target.value)
    };
    return(
        <>
            <span>Opis:</span>
            <textarea onChange={handleDescription} maxLength={300} className="w-100 h-50">
            </textarea>
        </>
    );
}
export default OfferDescription;
