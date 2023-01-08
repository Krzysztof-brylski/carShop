import React,{useState,useEffect} from 'react';
import Table from "../Assets/table";

export function AdminList({currentIndex,index}) {
    if( currentIndex != index)return null;


    const namesTranslations={
        "_id":"ID Uztkownika",
        "name": "Nazwa Użytkownika",
        "accountRole": "Rola",
        "deleteAdmin":{
            "name":"Usuń administratora",
            "style":"btn btn-danger"
        },
    };
    return (
        <Table dataSource={"http://127.0.0.1:8000/admin/adminList"} namesTranslations={namesTranslations}/>
    )
}

export default AdminList;
