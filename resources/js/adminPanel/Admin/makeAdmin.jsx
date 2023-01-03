import React,{useState,useEffect} from 'react';

export function MakeAdmin({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>MakeAdmin</h1>
        </div>
    )
}

export default MakeAdmin;
