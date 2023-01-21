import React,{useState,useEffect} from 'react';
import ReactDOM from "react-dom";
import {OfferSearching} from "../Offer/Searching/offerSearching";
import OfferThumbnail from "../Offer/Watch/Assets/offerThumbnail";
import axios from "axios";
function LandingPage() {

    const [data,setData]=useState([]);
    useEffect(()=>{
        axios.get("Offer").then((res)=>{
            setData(res.data);

        });
    },[]);
    return(
        <div className="row">
            <div className="col-xl-6">
                <OfferSearching/>
            </div>
            <div className="col-xl-6">
                <img src={"#"} />
            </div>
            <div className="col-xl-12 my-4">
                <h3 className="px-5 mx-3">Wyróżnione oferty:</h3>
                <div className="row justify-content-center">

                    {
                        data.length!==0 &&
                        data.map((element)=>{
                            return (<OfferThumbnail data={element} />)
                        })
                    }
                </div>
            </div>
        </div>
    )

}

ReactDOM.render(<LandingPage/>,document.querySelector('#LandingPage'));
