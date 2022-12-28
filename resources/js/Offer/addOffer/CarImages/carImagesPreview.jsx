import React,{useState} from 'react';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faTrashCan} from "@fortawesome/free-solid-svg-icons";
/**
 * display post images preview,
 * images slider, deleting images from offer
 * @component
 * @param {boolean} display; boolean for displaying image preview
 * @param {Array} files; array with images
 * @param {function} setConfirmedImages; saving confirmed images
 * @param {function} showSendForm; function showing form-send element
 * @param {function} killModal; function closing modal
 * @returns {null|<ImagePreview/>}
 *
 */
export function CarImagesPreview({display,files,setConfirmedImages,killModal}) {
    if(!display) return null;
    const[currentSlide,setCurrentSlide]=useState(0);
    const[deletedSlides,setDeletedSlides]=useState([]);
    var slides=[];

    files.map((e, key)=>{
        if(!(key in deletedSlides)){
            slides.push(<div className="img-preview"  style={{backgroundImage:`url(${e.preview})`}} />);
        }
    });
    const sliderControl={
        cursor:"pointer",
        fontSize: "30px",
        transform: "translate(0, -50%)",
    };
    const sendBtn={
        position:"absolute",
        cursor:"pointer",
        left:"85%",
        top:"5%",
        fontWeight:"bold",
    };
    const dellImageStyle={
        position:"absolute",
        cursor:"pointer",
        color:"light-blue",
        right:"90%",
        top:"5%",
    };
    const postModalStyle={
        height:"100%",
        width:"100%",
        inset:`${window.scrollY}px 0 0 0 `
    };

    const prevSlide=()=>{
        if(currentSlide>0){
            setCurrentSlide(currentSlide-1);
        }
    };
    const nextSlide=()=>{
        if(currentSlide<slides.length-1){
            setCurrentSlide(currentSlide+1);
        }
    };

    const confirm=()=>{
        setConfirmedImages(files);
        killModal();
    };

    const dellImage=()=>{
        setDeletedSlides((prev)=>[...prev,currentSlide]);
        if(slides.length === 1){
            killModal();
        }
    };
    return(
        <div className="modal-overlay" style={postModalStyle} onClick={(event => {event.stopPropagation()})} >
            <div className="d-flex justify-content-center align-items-center h-100">
                <div className="content w-50 position-relative" >
                    <div className="position-absolute top-50 w-100 d-flex justify-content-between">
                        <span className="mx-3" onClick={prevSlide} style={sliderControl}>❰</span>
                        <span className="mx-3" onClick={nextSlide} style={sliderControl}>❱</span>
                    </div>

                    <span style={sendBtn} className="m-1 cursor-pointer" onClick={confirm}>Zatwierdź</span>

                    <FontAwesomeIcon style={dellImageStyle} onClick={dellImage} size={"lg"} icon={faTrashCan} />
                    {
                        slides[currentSlide]
                    }
                </div>
            </div>
        </div>
    );
}
export default CarImagesPreview;
