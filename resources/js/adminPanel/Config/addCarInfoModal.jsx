import React,{useState,useEffect} from 'react';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faXmark} from "@fortawesome/free-solid-svg-icons";

export function AddCarInfoModal({display,data,setDisplay}) {
    if (!display){return null}

    const [manufacturer,setManufacturer]=useState("");
    const [model,setModel]=useState("");
    const [version,setVersion]=useState("");

    useEffect(()=>{
        if(data.model === null){
            setManufacturer(data.manufacturer);
        }else if(data.version === null){
            setManufacturer(data.manufacturer);
            setModel(data.model);
        }
    },[]);


    const postModalStyle={
        inset:`${window.scrollY}px 0 0 0 `
    };
    const sendRequest=()=>{
        var formData= new FormData();

        formData.append("_token",crsfToken);
        formData.append("manufacturer",manufacturer);
        formData.append("model",model);
        formData.append("version",version);
        axios.post(`/admin/carInfo/${manufacturer}/${model}/${version}`,formData).then((res)=>{
            console.log(res);
           //todo success or error modal
        });

    };
    const handleManufacturer=(event)=>{
        setManufacturer(event.target.value);
    };
    const handleModel=(event)=>{
        setModel(event.target.value);
    };
    const handleVersion=(event)=>{
        setVersion(event.target.value);
    };
    const onClose=()=>{
        setDisplay(false);
    };
    return (
        <div className="modal-overlay" style={postModalStyle}>
            <div className="modal-close-btn-container">
                <p onClick={onClose} className="modal-close-btn m-3">
                    <FontAwesomeIcon icon={faXmark} size={"3x"} style={{color:"white",cursor:"pointer"}}/>
                </p>
            </div>
            <div className="d-flex justify-content-center align-items-center h-100 w-100">
                <div className="w-50 h-50 bg-white p-4" style={{border:"1px solid transparent",borderRadius:"15px"}}>

                    <h2>Dodaj informacje o samochodzie</h2>
                    <div className="my-3">

                        <input className="my-2" value={data.manufacturer} style={null} onChange={handleManufacturer} disabled={data.manufacturer !== null}/>
                        {
                            data.manufacturer !== null &&
                            <input className="my-2" value={data.model} style={null} onChange={handleModel} disabled={data.model !== null}/>
                        }
                        {
                            data.model !== null  &&
                            <input className="my-2" value={data.version} style={null} onChange={handleVersion}/>
                        }

                        <button className="btn btn-success my-2" onClick={sendRequest}>Dodaj</button>
                    </div>
                </div>
            </div>
        </div>
    )

}
export default AddCarInfoModal;
