import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

export function CounterWidget({data,style,icon}) {

    return(
        <div style={style.box} className={`d-flex flex-column ${style.cols}`} >
            <FontAwesomeIcon style={style.icon} icon={icon} size={style.icon.size}/>
            <h4 style={style.header}>{data.value}</h4>
            <span style={style.type}>{data.type}</span>
        </div>
    )
}
export default CounterWidget;
