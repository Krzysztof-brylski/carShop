import React,{useState,useEffect} from 'react';
import Table from "../Assets/table";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faXmark} from "@fortawesome/free-solid-svg-icons";
export function AddCarEquipmentModal({display,setDisplay}) {

    if (!display){return null;}

    const [data,setData]=useState("");
    const postModalStyle={
        inset:`${window.scrollY}px 0 0 0 `
    };

    const handle=(event)=>{
        setData(event.target.value);
    };
    const onClose=()=>{
        setDisplay(false);
    };
    const sendRequest=()=>{
        let formData= new FormData();
        formData.append("_token",crsfToken);
        formData.append("equipment",data);
        axios.post(storeCarEquipmentGateWay,formData).then((res)=>{
            console.log(res);
            //todo success or error modal
        })
    };

    return(
        <div className="modal-overlay" style={postModalStyle}>
            <div className="modal-close-btn-container">
                <p onClick={onClose} className="modal-close-btn m-3">
                    <FontAwesomeIcon icon={faXmark} size={"3x"} style={{color:"white",cursor:"pointer"}}/>
                </p>
            </div>
            <div className="d-flex justify-content-center align-items-center h-100 w-100">
                <div className="bg-white p-4 " style={{border:"1px solid transparent",borderRadius:"15px",width:"30%",height:"30%"}}>
                    <h2>Dodaj Wyposarzenie</h2>
                    <div className="my-3">
                        <div className="my-3 d-flex flex-column ">
                            <span>Nazwa wyposarzenia:</span>
                            <input className={"w-75"} type="text" onChange={handle}/>
                        </div>

                        <button className="btn btn-success my-2" onClick={sendRequest}>Dodaj Wyposarzenie</button>
                    </div>
                </div>
            </div>
        </div>
    )

}
export default AddCarEquipmentModal;
