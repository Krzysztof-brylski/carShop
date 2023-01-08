import React,{useState,useEffect} from 'react';
import Table from "../Assets/table";

export function UserBanedList({currentIndex,index}) {
    if( currentIndex != index)return null;

    const namesTranslations={
        "_id":"ID Uztkownika",
        "name": "Nazwa Użytkownika",
        "accountRole": "Rola",
        "unBanUser":{
            "name":"Od-banuj",
            "style":"btn btn-danger"
        },
        "deleteUser":{
            "name":"Usuń użytkownika",
            "style":"btn btn-danger"
        },
        "show":{
            "name":"Zobacz",
            "style":"d-none"
        },
        "banUser":{
            "name":"Odrzuć",
            "style":"d-none"
        },
    };

    return (
        <Table dataSource={"http://127.0.0.1:8000/admin/baned/usersList"} namesTranslations={namesTranslations}/>
    )
}

export default UserBanedList;
