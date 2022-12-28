import React from 'react';
import {useState,useEffect,useCallback} from "react";

import { GoogleMap, useJsApiLoader,Marker} from '@react-google-maps/api';
export function LocalizationInput({setOfferLocalization}){
    const containerStyle = {
        width: '1000px',
        height: '500px',
    };
    const center = {
        lat: 52,
        lng: 19
    };
    const { isLoaded } = useJsApiLoader({
        id: 'google-map-script',
        googleMapsApiKey: "AIzaSyDwZHEYsBoXtvoGURomYqTNNbN-X3aCoZ8"
    });

    const [map, setMap] = useState(null);
    const[markerPos,setMarkerPos] = useState(center);
    const onLoad = useCallback(function callback(map) {
        setMap(map);
    }, []);

    const onUnmount = useCallback(function callback(map) {
        setMap(null)
    }, []);

    const onMarkerDragEnd=(e)=>{
        setMarkerPos(e.latLng);
        setOfferLocalization(markerPos.toString());
    };


    return isLoaded ? (
        <GoogleMap
            mapContainerStyle={containerStyle}
            center={center}
            zoom={6}
            onLoad={onLoad}
            onUnmount={onUnmount}
        >
            <Marker
                position={markerPos}
                draggable={true}
                onDragEnd={onMarkerDragEnd}
            />
        </GoogleMap>
    ) : <></>
}
export default LocalizationInput;
