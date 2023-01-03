import React,{useState,useEffect} from 'react';

export function AccountTypeConfirmation({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>AccountTypeConfirmation</h1>
        </div>
    )
}

export default AccountTypeConfirmation;
