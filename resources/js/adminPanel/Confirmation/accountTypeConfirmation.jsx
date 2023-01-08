import React,{useState,useEffect} from 'react';
import Table from "../Assets/table";

export function AccountTypeConfirmation({currentIndex,index}) {
    if( currentIndex != index)return null;

    const namesTranslations={
        "id":"ID Zgłoszenia",
        "user_id": "ID Użytkownika",
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
        <Table dataSource={accountConfirmationGateWay} namesTranslations={namesTranslations}/>
    )
}

export default AccountTypeConfirmation;
