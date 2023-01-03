import React,{useState,useEffect} from 'react';

export function CarDetailsInput({setCarDetails}) {

    const [engineSize,setEngineSize]=useState(null);
    const [enginePower,setEnginePower]=useState(null);
    const [transmission,setTransmission]=useState(null);
    const [fuel,setFuel]=useState(null);
    const [productionYear,setProductionYear]=useState(null);
    const [mileage,setMileage]=useState(null);
    useEffect(()=>{
        if(engineSize !== null && enginePower !== null && transmission !== null && fuel !== null){
            setCarDetails({
                "engineSize":engineSize,
                "enginePower":enginePower,
                "transmission":transmission,
                "fuel":fuel,
                "productionYear":productionYear,
                "mileage":mileage,
            });
        }

    },[engineSize,enginePower,transmission,fuel]);

    const handleEngineSize=(event)=>{

        setEngineSize(event.target.value);
    };
    const handleEnginePower=(event)=>{
        setEnginePower(event.target.value);
    };
    const handleTransmission=(event)=>{
        setTransmission(event.target.value);
    };
    const handleProductionYear=(event)=>{
        setProductionYear(event.target.value);
    };
    const handleMileage=(event)=>{
        setMileage(event.target.value);
    };
    const handleFuel=(event)=>{
        setFuel(event.target.value);
    };

    return(
        <div className="row">
            <div className="col-xl-6 my-2">
                <span >Pojemność silnika</span>
                <input onChange={handleEngineSize} type="number"/>
            </div>

            <div className="col-xl-6 my-2">
                <span>Moc silnika</span>
                <input onChange={handleEnginePower} type="number"/>
            </div>

            <div className="col-xl-6">
                <span>Rodzaj paliwa</span>
                <select onChange={handleFuel}>
                    <option selected>--Wybierz Rodzaj Paliwa--</option>
                    <option value="Benzyna" >Benzyna</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Hybrydowy">Hybrydowy</option>
                    <option value="Elektryczny">Elektryczny</option>
                </select>
            </div>

            <div className="col-xl-6">
                <span>Skrzynia biegów</span>
                <select onChange={handleTransmission}>
                    <option selected>--Wybierz Skrzynie Biegów--</option>
                    <option value="Automatyczna" >Automatyczna</option>
                    <option value="Manualna" >Manualna</option>
                </select>
            </div>

            <div className="col-xl-6">
                <span>Rok produkcji</span>
                <input onChange={handleProductionYear}  type="number" />
            </div>

            <div className="col-xl-6">
                <span>Przebieg</span>
                <input onChange={handleMileage} type="number" />
            </div>

        </div>
    )


}
export default CarDetailsInput;
