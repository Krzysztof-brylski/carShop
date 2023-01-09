import React,{useState,useEffect} from 'react';

export function AddCarInfoModal({display,data}) {
    if (!display){return null;}

    const postModalStyle={
        inset:`${window.scrollY}px 0 0 0 `
    };

    return (
        <div className="modal-overlay" style={postModalStyle}>
            <div className="d-flex justify-content-center align-items-center h-100 w-100">
                <div className="w-50 h-75 bg-white p-4" style={{border:"1px solid transparent",borderRadius:"15px"}}>
                    <h2>Dodaj informacje o samochodzie</h2>
                    <div className="my-3">

                        <button className="btn btn-success my-2">Dodaj</button>
                    </div>
                </div>
            </div>
        </div>
    )

}
export default AddCarInfoModal;
