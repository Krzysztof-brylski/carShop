import React, {useEffect, useState} from 'react';


export function OfferAuthorContactInput({setOfferContact}){

    const [email,setEmail]=useState(null);
    const [phoneNumber,setPhoneNumber]=useState(null);

    useEffect(()=>{
        if(email !== null && phoneNumber !== null){
            setOfferContact({
                "email":email,
                "phone":phoneNumber,
            });
        }
    },[email,phoneNumber]);

    const handleEmail=(event)=>{
        setEmail(event.target.value)
    };
    const handlePhoneNumber=(event)=>{
        setPhoneNumber(event.target.value)
    };
    return(
        <div className="row">
             <div className="col-xl-6 d-flex flex-column">
                <span>Adres e-mail</span>
                <input type="email" onChange={handleEmail}/>
             </div>
            <div className="col-xl-6 d-flex flex-column">
                <span>Nr. telefonu</span>
                <input type="text" onChange={handlePhoneNumber}/>
            </div>
        </div>
    )
}
export default OfferAuthorContactInput;
