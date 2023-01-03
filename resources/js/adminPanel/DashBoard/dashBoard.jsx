import React,{useState,useEffect} from 'react';
import CounterWidget from "../Assets/Widgets/counterWidget";
import {faUsers,faTruckFast,faDollarSign,faBuildingCircleCheck} from '@fortawesome/free-solid-svg-icons';
import ConfirmationCounterWidget from "../Assets/Widgets/confirmationCounterWidget";
import DiagramWidget from "../Assets/Widgets/diagramWidget";
//todo get all data from db

export function DashBoard({currentIndex,index}) {
    if( currentIndex != index)return null;
    const counterWidgetStyle={
        box:{
            border:"1px solid transparent",
            borderRadius:"15px",
            backgroundColor:"white",
            justifyContent:"center",
            alignItems:"center",
            padding:"10px",
            margin:"10px 5px 10px 5px",
        },
        header:{
            margin: "10px 0 10px 0",
        },
        type:{},
        icon:{
            size:"3x"
        },
        cols:"col-xl-2"
    };
    return (
        <div>
            <h1>DashBoard</h1>
            <div className="row justify-content-center">
                <CounterWidget
                    style={counterWidgetStyle}
                    icon={faUsers}
                    data={{
                        type:"Użytkownicy",
                        value:"123",
                    }}
                />

                <CounterWidget
                    style={counterWidgetStyle}
                    icon={faBuildingCircleCheck}
                    data={{
                        type:"Konta Firmowe",
                        value:"321",
                    }}
                />

                <CounterWidget
                    style={counterWidgetStyle}
                    icon={faTruckFast}
                    data={{
                        type:"Ogłoszenia",
                        value:"32112",
                    }}
                />

                <CounterWidget
                    style={counterWidgetStyle}
                    icon={faDollarSign}
                    data={{
                        type:"Wartość ogłoszeń",
                        value:"32112123",
                    }}
                />

                <ConfirmationCounterWidget/>
                <DiagramWidget/>

            </div>

        </div>
    )
}

export default DashBoard;
