import React from 'react';


export function DiagramWidget() {
    const widgetStyle={
        border:"1px solid transparent",
        borderRadius:"15px",
        backgroundColor:"white",
        justifyContent:"center",

    };
    return(
        <div className="col-xl-4 mx-3 my-4" style={widgetStyle}>
            <h4 className="m-2">Zyski</h4>
            <h1>WYKRES!</h1>
        </div>
    )

}
export default DiagramWidget;
