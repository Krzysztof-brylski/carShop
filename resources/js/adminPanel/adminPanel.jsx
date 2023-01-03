import React,{useState,useEffect} from 'react';
import ReactDOM from "react-dom";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import {faUsers,faUserTie,faGear,faCircleCheck,faRightFromBracket,faGaugeHigh,
    faBan,faUserPlus,faFlag,faScrewdriverWrench,faBuildingCircleCheck,faCarSide,
    faCircleInfo,faTruckFast} from '@fortawesome/free-solid-svg-icons';
import {faAddressBook} from '@fortawesome/free-regular-svg-icons';

import UserList from "./Users/usersList";
import UserBanedList from "./Users/banedUserList";
import AdminList from "./Admin/adminList";
import MakeAdmin from "./Admin/makeAdmin";
import OfferConfirmation from "./Confirmation/offerConfirmation";
import RepairsConfirmation from "./Confirmation/repairsConfirmation";
import AccountTypeConfirmation from "./Confirmation/accountTypeConfirmation";
import ReportsConfirmation from "./Confirmation/reportsConfirmation";
import CarInfoConfig from "./Config/carInfoConfig";
import CarEquipmentConfig from "./Config/carEquipmentConfig";
import DashBoard from "./DashBoard/dashBoard";
/**
 *
 * @returns {*}
 *
 */
function AdminPanel(){

    const[showUserSubElement,setShowUserSubElement]=useState(false);
    const[showAdminSubElement,setShowAdminSubElement]=useState(false);
    const[showOfferSubElement,setShowOfferSubElement]=useState(false);
    const[showConfigSubElement,setShowConfigSubElement]=useState(false);
    /** views */
    const [currentIndex,setCurrentIndex]=useState(0);

    const handleUserSubElement=()=>{
        setShowUserSubElement(!showUserSubElement);
    };
    const handleAdminSubElement=()=>{
        setShowAdminSubElement(!showAdminSubElement);
    };
    const handleOfferSubElement=()=>{
        setShowOfferSubElement(!showOfferSubElement);
    };
    const handleConfigSubElement=()=>{
        setShowConfigSubElement(!showConfigSubElement);
    };
    const logout=()=>{
        let form = new FormData();
        form.append("_token",crsfToken);
        axios.post(logoutGateWay,form).then((response)=>{
            window.location.reload();
        });
    };
    useEffect(()=>{
        const handleClickEvent=(event)=>{
           let id = event.target.parentElement.getAttribute('data-key');
           if(id === null)return null;
            setCurrentIndex(id);
        };
        document.querySelectorAll(".adminPanelElement").forEach((element)=>{
            element.addEventListener("click",(event)=>{handleClickEvent(event)});
        });
        return ()=>{window.removeEventListener("click",handleClickEvent)}
    },[]);


    return(
        <div className="row h-100">
            <div className="col-xl-2 adminPanel h-100">
                <div className="adminPanelElement" onClick={()=>{setCurrentIndex(0)}}>
                    <div className="d-flex flex-row w-100" >
                        <FontAwesomeIcon icon={faGaugeHigh} size={"xl"}/>
                        <h5>Panel główny</h5>
                    </div>
                </div>
                <div className="adminPanelElement" onClick={handleUserSubElement}>
                    <div className="d-flex flex-row w-100">
                        <FontAwesomeIcon icon={faUsers} size={"xl"}/>
                        <h5>Użytkownicy</h5>
                    </div>
                    {
                        showUserSubElement &&
                        <div className="adminPanelSubElementsContainer" onClick={(event)=>{event.stopPropagation()}}>
                                <div className="adminPanelSubElement"  data-key="1">
                                    <FontAwesomeIcon icon={faAddressBook} size={"lg"}/>
                                    <h6>Lista użytkowników</h6>
                                </div>
                                <div className="adminPanelSubElement"  data-key="2">
                                    <FontAwesomeIcon icon={faBan} size={"lg"}/>
                                    <h6>Lista Zablokowanych</h6>
                                </div>
                        </div>
                    }
                </div>
                <div className="adminPanelElement" onClick={handleAdminSubElement}>
                    <div className="d-flex flex-row w-100">
                        <FontAwesomeIcon icon={faUserTie} size={"xl"}/>
                        <h5>Administratorzy</h5>
                    </div>
                    {
                        showAdminSubElement &&
                        <div className="adminPanelSubElementsContainer" onClick={(event)=>{event.stopPropagation()}} >
                            <div className="adminPanelSubElement" data-key="3">
                                <FontAwesomeIcon icon={faUserPlus} size={"lg"}/>
                                <h6>Mianuj administratora</h6>
                            </div>
                            <div className="adminPanelSubElement" data-key="4">
                                <FontAwesomeIcon icon={faAddressBook} size={"lg"}/>
                                <h6>Lista administratorów</h6>
                            </div>
                        </div>
                    }
                </div>
                <div className="adminPanelElement" onClick={handleOfferSubElement}>
                    <div className="d-flex flex-row w-100">
                        <FontAwesomeIcon icon={faCircleCheck} size={"xl"}/>
                        <h5>Zatwierdź</h5>
                    </div>
                    {
                        showOfferSubElement &&
                        <div className="adminPanelSubElementsContainer" onClick={(event)=>{event.stopPropagation()}}>
                            <div className="adminPanelSubElement" data-key="5">
                                <FontAwesomeIcon icon={faTruckFast} size={"lg"}/>
                                <h6>Ogłoszenie</h6>
                            </div>
                            <div className="adminPanelSubElement" data-key="6">
                                <FontAwesomeIcon icon={faScrewdriverWrench} size={"lg"}/>
                                <h6>Lista napraw</h6>
                            </div>
                            <div className="adminPanelSubElement" data-key="7">
                                <FontAwesomeIcon icon={faBuildingCircleCheck} size={"lg"}/>
                                <h6>Konto firmowe</h6>
                            </div>
                            <div className="adminPanelSubElement" data-key="8">
                                <FontAwesomeIcon icon={faFlag} size={"lg"}/>
                                <h6>Zgłoszenia</h6>
                            </div>
                        </div>
                    }


                </div>
                <div className="adminPanelElement" onClick={handleConfigSubElement}>
                    <div className="d-flex flex-row w-100">
                        <FontAwesomeIcon icon={faGear} size={"xl"}/>
                        <h5>Konfiguracja</h5>
                    </div>
                    {
                        showConfigSubElement &&
                        <div className="adminPanelSubElementsContainer" onClick={(event)=>{event.stopPropagation()}}>
                            <div className="adminPanelSubElement" data-key="9">
                                <FontAwesomeIcon icon={faCarSide} size={"lg"}/>
                                <h6>Informacje o samochodach</h6>
                            </div>
                            <div className="adminPanelSubElement" data-key="10">
                                <FontAwesomeIcon icon={faCircleInfo} size={"lg"}/>
                                <h6>Wyposarzenie samochodu</h6>
                            </div>
                        </div>
                    }
                </div>

                <div className="adminPanelElement" onClick={logout}>
                    <div className="d-flex flex-row w-100">
                        <FontAwesomeIcon icon={faRightFromBracket} size={"xl"}/>
                        <h5>Wyloguj</h5>
                    </div>
                </div>


            </div>
            <div className="col-xl-10" style={{backgroundColor:"#f0f0f0"}}>
                <DashBoard currentIndex={currentIndex} index={0}/>
                <UserList currentIndex={currentIndex} index={1} />
                <UserBanedList currentIndex={currentIndex} index={2} />

                <MakeAdmin currentIndex={currentIndex} index={3} />
                <AdminList currentIndex={currentIndex} index={4} />

                <OfferConfirmation currentIndex={currentIndex} index={5}/>
                <RepairsConfirmation currentIndex={currentIndex} index={6}/>
                <AccountTypeConfirmation currentIndex={currentIndex} index={7}/>
                <ReportsConfirmation currentIndex={currentIndex} index={8}/>

                <CarInfoConfig currentIndex={currentIndex} index={9}/>
                <CarEquipmentConfig currentIndex={currentIndex} index={10}/>


            </div>
        </div>
    );
}

ReactDOM.render(<AdminPanel/>,document.querySelector('#adminPanel'));
