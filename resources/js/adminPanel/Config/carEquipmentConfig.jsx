import React,{useState,useEffect} from 'react';
import Table from "../Assets/table";
import AddCarE from "./addCarInfoModal";
import AddCarEquipmentModal from "./addCarEquipmentModal";
export function CarEquipmentConfig({currentIndex,index}) {
    if( currentIndex != index)return null;

    const [display,setDisplay]=useState(false);

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

    const addEquipment=()=>{
        setDisplay(!display);
    };

    return (
        <>

            <Table dataSource={"http://127.0.0.1:8000/carEquipment"} namesTranslations={namesTranslations}/>
            <div className="d-flex justify-content-center my-3">
                <button className="btn btn-success" onClick={addEquipment} >Dodaj wyposarzenie</button>
                <AddCarEquipmentModal display={display} setDisplay={setDisplay} />
            </div>
        </>

    )
}

export default CarEquipmentConfig;
