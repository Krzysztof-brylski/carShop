import {useDropzone} from "react-dropzone";
import React, {useState} from 'react';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faImage} from "@fortawesome/free-solid-svg-icons";
import CarImagesPreview from "./carImagesPreview";
export function CarImagesDropDown({setCarImages}) {
    const [files,setFiles]=useState([]);
    const [showPreview,setShowPreview]=useState(false);
    const {getRootProps,getInputProps}=useDropzone({
        accept:"image/*",
        onDrop: (acceptedFiles => {
            if(acceptedFiles.length>0) {
                setFiles(
                    acceptedFiles.map((file) => Object.assign(file, {
                            preview: URL.createObjectURL(file),
                        })
                    )
                );
                setShowPreview(true);
            }
        }),
    });
    return(
        <div  {...getRootProps()}>
            <input {...getInputProps()}/>
            <FontAwesomeIcon icon={faImage} size={"6x"} className="my-3"/>
            <h3 >Przeciągnij zdjęcia samochodu</h3>
            <button className="form-submit my-2 w-auto">Wybierz z komputera</button>
            <CarImagesPreview
                display={showPreview}
                files={files}
                setConfirmedImages={setCarImages}
                killModal={()=>{setShowPreview(false)}}
            />

        </div>
    );


}
export default CarImagesDropDown;
