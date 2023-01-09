import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import {faEyeSlash} from '@fortawesome/free-solid-svg-icons';

export function EmptyResult({name}) {
    return(
        <div className="d-flex align-items-center justify-content-center flex-column h-50">
            <FontAwesomeIcon icon={faEyeSlash} size={"4x"}/>
            <h2 className="my-2">Upss... </h2>
            <h4 className="my-2">Strona jest pusta</h4>
        </div>
    )
}
export default EmptyResult
