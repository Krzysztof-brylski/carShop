import React,{useState} from 'react';
import ReactDOM from "react-dom";

function OfferImageSlider(){
    let images=JSON.parse(offerImages.replace(/&quot;/g,'"'));
    const [currentSlide,setCurrentSlide]=useState(0);
    const [displayControl,setDisplayControl]=useState(true);

    const postImage={
        padding:"0",
        width:"700px",
        height:"500px",
        border:"solid 0 transparent",
        borderRadius: "15px"
    };
    const sliderControl={
        cursor:"pointer",
        border:"transparent 1px solid",
        borderRadius:"100%",
        width:"35px",
        height:"35px",
        margin:"10px",
        transform: "translate(0, -50%)",
        backgroundColor:"rgba(255,255,255,0.9)",
        display:"flex",
        justifyContent:"center",
        alignContent:"center",
    };

    const slides=images.map(image=>(
        <img  style={postImage}  src={Storage+'/'+image}/>
    ));

    const nextSlide=()=>{
        if(currentSlide+1 < slides.length){
            setCurrentSlide(currentSlide+1);
        }
    };
    const pervSlide=()=>{
        if(currentSlide-1 >= 0){
            setCurrentSlide(currentSlide-1);
        }
    };

    return(
        <div className="h-75 w-75 position-relative">
            {
                displayControl &&
                (
                    <div className="position-absolute top-50 w-100 h-50 d-flex flex-column">

                        <div className="w-100 d-flex justify-content-between">
                            <span onClick={pervSlide} className="p-2" style={sliderControl}>❰</span>
                            <span onClick={nextSlide} className="p-2" style={sliderControl}>❱</span>
                        </div>
                        <div className="d-flex flex-row justify-content-center h-75 py-3" style={{alignItems:"flex-end"}}>
                        </div>
                    </div>
                )
            }
            {slides[currentSlide]}
        </div>

    );

}
ReactDOM.render(<OfferImageSlider/>,document.querySelector('#OfferImageSlider'));
