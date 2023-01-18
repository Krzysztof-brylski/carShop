import React,{useState} from 'react';
import ReactDOM from "react-dom";
import ImageGallery from 'react-image-gallery';

function OfferImageSlider(){
    let tempImages=JSON.parse(offerImages.replace(/&quot;/g,'"'));
    let images=[];
    const [currentSlide,setCurrentSlide]=useState(0);
    const [displayControl,setDisplayControl]=useState(true);



    tempImages.map((element)=>{
        images.push({
            "original":Storage+"/"+element,
            "thumbnail":Storage+"/"+element,
        })
    });


    return <ImageGallery
        items={images}
        showFullscreenButton={false}
        showPlayButton={false}
        additionalClass={"slide_style"}
    />;

}
ReactDOM.render(<OfferImageSlider/>,document.querySelector('#OfferImageSlider'));
