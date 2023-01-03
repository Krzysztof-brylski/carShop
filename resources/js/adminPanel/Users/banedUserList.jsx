import React,{useState,useEffect} from 'react';

export function UserBanedList({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>BanedUserList</h1>
        </div>
    )
}

export default UserBanedList;
