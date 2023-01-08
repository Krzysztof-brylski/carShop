import React,{useState,useEffect} from 'react';

export function MakeAdmin({currentIndex,index}) {
    if( currentIndex != index)return null;

    return (
        <div>
            <h1>Stwórz konto administratora</h1>
            <div className="">
                <div>
                    <span>Imie i nazwisko</span>
                    <input type="text" required/>
                </div>
                <div>
                    <span>Adres e-mail</span>
                    <input type="email" required/>
                </div>
                <div>
                    <span>Potwierdź e-mail</span>
                    <input type="email" required/>
                </div>
                <div>
                    <button className="btn btn-primary">Dodaj Administratora</button>
                </div>
            </div>
        </div>
    )
}

export default MakeAdmin;
