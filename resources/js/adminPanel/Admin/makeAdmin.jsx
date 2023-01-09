import React,{useState,useEffect} from 'react';

export function MakeAdmin({currentIndex,index}) {
    if( currentIndex != index)return null;
    const [name,setName]=useState("");
    const [email,setEmail]=useState("");
    const [emailConfirm,setEmailConfirm]=useState("");
    const makeAdmin=()=>{
        let from = new FormData;
        from.append("_token",crsfToken);
        from.append("name",name);
        from.append("email",email);
        from.append("email_confirmation",emailConfirm);

        axios.post("http://127.0.0.1:8000/admin/makeAdmin",from);
    };

    const handleName=(event)=>{
        setName(event.target.value);
    };
    const handleEmail=(event)=>{
        setEmail(event.target.value);
    };
    const handleEmailConfirm=(event)=>{
        setEmailConfirm(event.target.value);
    };
    return (
        <div>
            <h1>Stwórz konto administratora</h1>
            <div className="">
                <div>
                    <span>Imie i nazwisko</span>
                    <input type="text" required onChange={handleName}/>
                </div>
                <div>
                    <span>Adres e-mail</span>
                    <input type="email" required onChange={handleEmail}/>
                </div>
                <div>
                    <span>Potwierdź e-mail</span>
                    <input type="email" required onChange={handleEmailConfirm}/>
                </div>
                <div>
                    <button className="btn btn-primary" onClick={makeAdmin}>Dodaj Administratora</button>
                </div>
            </div>
        </div>
    )
}

export default MakeAdmin;
