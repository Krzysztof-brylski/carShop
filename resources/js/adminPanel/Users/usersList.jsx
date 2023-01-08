import React,{useState,useEffect} from 'react';
import Table from "../Assets/table";

export function UserList({currentIndex,index}) {
    if( currentIndex != index)return null;

    const namesTranslations={
        "_id":"ID Uztkownika",
        "name": "Nazwa Użytkownika",
        "accountRole": "Rola",
        "banUser":{
            "name":"Z-banuj",
            "style":"btn btn-danger"
        },
        "show":{
            "name":"Zobacz",
            "style":"btn btn-warning"
        },
        "deleteUser":{
            "name":"",
            "style":"d-none"
        },
        "unBanUser":{
            "name":"",
            "style":"d-none"
        },
    };

    return (
        <Table dataSource={usersListGateWay} namesTranslations={namesTranslations}/>
    )
}
export default UserList;
