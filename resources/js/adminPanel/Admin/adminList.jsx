import React,{useState,useEffect} from 'react';

export function AdminList({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>AdminList</h1>
        </div>
    )
}

export default AdminList;
