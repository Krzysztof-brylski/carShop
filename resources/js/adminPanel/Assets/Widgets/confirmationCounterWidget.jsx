import React from 'react';

import CounterWidget from "./counterWidget";
import {faUsers,faTruckFast,faFlag,faScrewdriverWrench,faBuildingCircleCheck} from '@fortawesome/free-solid-svg-icons';
export function ConfirmationCounterWidget({data,style,icon}) {

    const widgetStyle={
        border:"1px solid transparent",
        borderRadius:"15px",
        backgroundColor:"white",
        justifyContent:"center",
    };

    const counterWidgetStyle={
        box:{
            alignItems:"center",
            padding:"10px",

        },
        header:{
            margin: "10px 0 10px 0",
        },
        type:{},
        icon:{
            size:"2x"
        },
        cols:"col-xl-6"
    };


    return(
        <div className="col-xl-4 mx-3 my-4" style={widgetStyle} >
            <h4 className="m-2">Oczekujące zatwierdzenia</h4>
            <div className="row">
                <CounterWidget
                    style={counterWidgetStyle}
                    icon={faTruckFast}
                    data={{
                        type:"Ogłoszenia",
                        value:"123",
                    }}
                />
                <CounterWidget
                    style={counterWidgetStyle}
                    icon={faBuildingCircleCheck}
                    data={{
                        type:"Konta Firmowe",
                        value:"123",
                    }}
                />
                <CounterWidget
                    style={counterWidgetStyle}
                    icon={faScrewdriverWrench}
                    data={{
                        type:"Naprawy",
                        value:"123",
                    }}
                />
                <CounterWidget
                    style={counterWidgetStyle}
                    icon={faFlag}
                    data={{
                        type:"Zgłoszenia",
                        value:"123",
                    }}
                />
            </div>
        </div>
    )

}
export default ConfirmationCounterWidget;
