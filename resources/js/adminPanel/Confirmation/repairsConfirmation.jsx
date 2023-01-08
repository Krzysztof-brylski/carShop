import React,{useState,useEffect} from 'react';
import Table from "../Assets/table";

export function RepairsConfirmation({currentIndex,index}) {
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
        <Table dataSource={repairsConfirmationGateWay} namesTranslations={namesTranslations}/>
    )
}

export default RepairsConfirmation;
