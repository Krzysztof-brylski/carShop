import React,{useState,useEffect} from 'react';

export function UserList({currentIndex,index}) {
    if( currentIndex != index)return null;



    return (
        <div>
            <h1>UserList</h1>
        </div>
    )
}
export default UserList;