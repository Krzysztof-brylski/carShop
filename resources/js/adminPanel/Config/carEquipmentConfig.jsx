import React,{useState,useEffect} from 'react';
import Table from "../Assets/table";
export function CarEquipmentConfig({currentIndex,index}) {
    if( currentIndex != index)return null;


    const namesTranslations={
        "id":"ID wyposarzenia",
        "name": "Nazwa wyposarzenia",
        "store":{
            "name":"Dodaj Element",
            "style":"btn btn-success"
        },
        "delete":{
            "name":"Usuń element",
            "style":"btn btn-danger"
        },
    };

    return (
        <Table dataSource={"http://127.0.0.1:8000/carEquipment"} namesTranslations={namesTranslations}/>
    )
}

export default CarEquipmentConfig;
