import React,{useState} from 'react';
import ReactDOM from "react-dom";
import CarInfoDropDown from "../addOffer/CarInfo/carInfoDropDown";




export function OfferSearching() {
    let dateRangeMin=( (new Date()).getFullYear() -100);
    let dateArr=[];
    const [manufacturer,setManufacturer]=useState(null);
    const [model,setModel]=useState(null);
    const [version,setVersion]=useState(null);
    const [priceMin,setPriceMin]=useState(0);
    const [priceMax,setPriceMax]=useState(100000000);
    const [productionYearMin,setProductionMinYear]=useState(1980);
    const [productionYearMax,setProductionMaxYear]=useState(2023);
    const [mileageMin,setMileageMin]=useState(0);
    const [mileageMax,setMileageMax]=useState(100000000);
    const handle=()=>{
        let params=`priceMin=${priceMin}&priceMax=${priceMax}
        &productionYearMin=${productionYearMin}&productionYearMax=${productionYearMax}
        &mileageMin=${mileageMin}&mileageMax=${mileageMax}`;
        let url = `search/${manufacturer===null?"":manufacturer}/${model===null?"":model+"/"}${version===null?"":version+"/"}?`+params;
        window.location.href = url;
    };


    for(let i=dateRangeMin+100;i>dateRangeMin;i--){
        dateArr.push(<option>{i}</option>);
    }

    const handlePriceMin=(event)=>{
        setPriceMin(event.target.value)
    };
    const handlePriceMax=(event)=>{
        setPriceMax(event.target.value)
    };
    //production year
    const handleProductionYearMin=(event)=>{
        productionYearMin(event.target.value)
    };
    const handleProductionYearMax=(event)=>{
        productionYearMax(event.target.value)
    };
    //mileage
    const handleMileageMin=(event)=>{
        setMileageMin(event.target.value)
    };
    const handleMileageMax=(event)=>{
        setMileageMax(event.target.value)
    };

    return(
        <div className="row justify-content-center p-2 m-5 bg-white rounded">
            <h3>Powiedz nam jakiego auta szukasz</h3>
            <div className="col-xl-6">
                <span>Marka samochodu</span>
                <CarInfoDropDown dataSource={ManufacturerGateWay} data={" "} role={"manufacturer"} setData={setManufacturer} setNextField={setModel} />
            </div>
            <div className="col-xl-6">
                <span>Model samochodu</span>
                <CarInfoDropDown dataSource={ModelGateWay} data={manufacturer} role={"model"} setData={setModel} setNextField={setVersion}/>
            </div>
            <div className="col-xl-6">
                <span>Wersja samochodu</span>
                <CarInfoDropDown dataSource={VersionGateWay} data={model} role={"version"} setData={setVersion}/>
            </div>
            <div className="col-xl-6">
                <span>Cena</span>
                <div>
                    <select onChange={handlePriceMin}>
                        <option value={0} selected>0 PLN</option>
                        <option value={1000} >1000 PLN</option>
                        <option value={2000} >2000 PLN</option>
                        <option value={5000}>5000 PLN</option>
                        <option value={10000}>10000 PLN</option>
                        <option value={15000}>15000 PLN</option>
                        <option value={20000}>20000 PLN</option>
                        <option value={30000}>30000 PLN</option>
                        <option value={50000}>50000 PLN</option>
                        <option value={100000}>100000 PLN</option>
                        <option value={500000}>500000 PLN</option>
                        <option value={1000000}>1000000 PLN</option>
                    </select>
                    <select onChange={handleMileageMax}>
                        <option value={0} selected>0 PLN</option>
                        <option value={1000} >1000 PLN</option>
                        <option value={2000} >2000 PLN</option>
                        <option value={5000}>5000 PLN</option>
                        <option value={10000}>10000 PLN</option>
                        <option value={15000}>15000 PLN</option>
                        <option value={20000}>20000 PLN</option>
                        <option value={30000}>30000 PLN</option>
                        <option value={50000}>50000 PLN</option>
                        <option value={100000}>100000 PLN</option>
                        <option value={500000}>500000 PLN</option>
                        <option value={1000000}>1000000 PLN</option>
                        <option value={10000000}>10000000 PLN</option>
                    </select>
                </div>
            </div>
            <div className="col-xl-6">
                <span>Rok produkcji</span>
                <div>
                    <select onChange={handleProductionYearMin}>
                        {
                            dateArr
                        }
                    </select>
                    <select onChange={handleProductionYearMax}>
                        {
                            dateArr
                        }
                    </select>
                </div>
            </div>
            <div className="col-xl-6">
                <span>Przebieg</span>
                <div>
                    <select onChange={handleMileageMin}>
                        <option value={0} selected>0 Km</option>
                        <option value={1000} >1000 Km</option>
                        <option value={2000} >2000 Km</option>
                        <option value={5000}>5000 Km</option>
                        <option value={10000}>10000 Km</option>
                        <option value={15000}>15000 Km</option>
                        <option value={20000}>20000 Km</option>
                        <option value={30000}>30000 Km</option>
                        <option value={50000}>50000 Km</option>
                        <option value={100000}>100000 Km</option>
                        <option value={500000}>500000 Km</option>
                        <option value={1000000}>1000000 Km</option>
                    </select>
                    <select onChange={handleMileageMax}>
                        <option value={0} selected>0 Km</option>
                        <option value={1000} >1000 Km</option>
                        <option value={2000} >2000 Km</option>
                        <option value={5000}>5000 Km</option>
                        <option value={10000}>10000 Km</option>
                        <option value={15000}>15000 Km</option>
                        <option value={20000}>20000 Km</option>
                        <option value={30000}>30000 Km</option>
                        <option value={50000}>50000 Km</option>
                        <option value={100000}>100000 Km</option>
                        <option value={500000}>500000 Km</option>
                        <option value={1000000}>1000000 Km</option>
                    </select>
                </div>
            </div>
            <button className="btn btn-primary w-25" onClick={handle}>Szukaj</button>
        </div>
    );


}

