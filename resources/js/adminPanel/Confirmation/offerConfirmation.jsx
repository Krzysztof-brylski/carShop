import React,{useState,useEffect} from 'react';
import {faUsers,} from '@fortawesome/free-solid-svg-icons';
import Table from "../Assets/table";
export function OfferConfirmation({currentIndex,index}) {
    if( currentIndex != index)return null;

    const namesTranslations={
        "id":"ID Zgłoszenia",
        "offer_id": "ID Ogłoszenia",
        "confirm":{
            "name":"Zatwierdz",
            "style":"btn btn-success"
        },
        "show":{
            "name":"Zobacz",
            "style":"btn btn-warning"
        },
        "reject":{
            "name":"Odrzuć",
            "style":"btn btn-danger"
        },
    };

    return (
        <Table dataSource={offerConfirmationGateWay} namesTranslations={namesTranslations}/>
    )
}

export default OfferConfirmation;
