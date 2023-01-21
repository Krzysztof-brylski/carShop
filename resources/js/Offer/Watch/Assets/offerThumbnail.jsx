import React,{useState} from 'react';

export function OfferThumbnail({data}) {
    return(

        <div className="card m-3 p-0 cursor-pointer" style={{width: "19rem"}}>
            <a href={ShowOffer+"/"+data._id} className="w-100 h-100 text-decoration-none text-black">
            <div className="card-img-top " style={{height:"60%"}}>
                <img style={{width:"100%",height:"100%"}} className="rounded-top" src={Storage+"/"+data.images[0]}/>
            </div>
            <div className="card-body " style={{height:"40%"}}>
                <h4 className="card-title">
                    {data.carInfo.manufacturer}-
                    {data.carInfo.model}-
                    {data.carInfo.version}
                </h4>
                <p className="card-text">
                    {data.details.productionYear}-
                    {data.details.mileage}km-
                    {data.details.engineType}

                </p>
                {
                    data.status !=="active"&&
                    <span className="my-2 h5 text-center" style={{color:"red"}}>Zarezerwowano</span>
                }
                {
                    data.status ==="active" &&
                    <span className="my-2 h5 text-center" style={{color:"red"}}>{data.price} PLN</span>
                }

            </div>
            </a>
        </div>
    )
}
export default OfferThumbnail;
