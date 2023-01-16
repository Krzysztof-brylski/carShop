import React,{useState} from 'react';
import ReactDOM from "react-dom";
import {OfferCarousel} from "./Assets/offerCarousel";

function WatchOffers(){

    return(
        <>
            <button>filtry</button>
            <OfferCarousel/>

        </>

    );

}
ReactDOM.render(<WatchOffers/>,document.querySelector('#WatchOffers'));
