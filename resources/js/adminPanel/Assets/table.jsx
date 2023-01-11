import React,{useEffect,useState} from 'react';
import axios from "axios";
import EmptyResult from "../../helpers/noResults";
import LoadingScreen from "../../helpers/loading";
export function Table({dataSource,namesTranslations}) {

    const[dataUrl,setDataUrl]=useState(dataSource);
    const[data,setData]=useState([]);
    const[actions,setActions]=useState([]);
    const[control,setControl]=useState([]);
    const[loading,setLoading]=useState(true);
    const[emptyResult,setEmptyResult]=useState(false);
    useEffect(()=>{
        setLoading(true);
        axios.get(dataUrl,{}).then((res)=>{
            if(res.data.paginator.data.length !== 0){
                setData(res.data.paginator.data);
                setControl(res.data.paginator.links);
                setActions(res.data.actions)
            }else{
                setEmptyResult(true)
            }
        });

        setLoading(false);
    },[dataUrl]);

    const handleActionBtn=(objectID,actionType)=>{
        let url=dataSource+"/"+actionType+"/"+objectID;
        let method="POST";
        if(actionType==="show"){
            method="GET";
        }
        axios.request({"method":method,"url":url}).then((res)=>{
            //todo confirmation then success or error info
            console.log(res);
        })

    };



    const changePage=(source)=>{
        if(source !== null){
            setDataUrl(source);
        }
    };
    const paginatorStyle={
        display:"flex",
        justifyContent:"center",
        alignItems:"center",
        margin:"10px",
        padding:"10px",
        width:"35px",
        height:"35px",
        borderRadius:"10px",
        border:"1px solid #ddd",
        cursor:"pointer",
    };

    return(
        <div>
            {
                emptyResult &&
                    <EmptyResult/>
            }
            {

                data.length !== 0 && !emptyResult &&
                <>

                    <div className="d-flex justify-content-center">
                        <table className="table">
                            <thead>
                            <tr>
                                {
                                   Object.keys(data[0]).map((element)=>{
                                        return (<th>{namesTranslations[element]}</th>)
                                    })
                                }
                                <th>Akcje</th>
                            </tr>
                            </thead>
                            <tbody>
                            {
                                data.map((element)=>{
                                    return (<tr>
                                        {
                                            Object.keys(data[0]).map((subElement)=>{
                                                return (<td>{element[subElement]}</td>)
                                            })
                                        }
                                        <td>{actions.map((subElement)=>{
                                            if(subElement !== "store"){
                                                return (<button
                                                    className={namesTranslations[subElement].style}
                                                    onClick={()=>handleActionBtn(
                                                        element[Object.keys(data[0])[0]],
                                                        subElement,
                                                    )}
                                                >{namesTranslations[subElement].name}</button>)
                                            }
                                        })}</td>
                                    </tr>)
                                })
                            }
                            </tbody>
                        </table>
                    </div>
                    <div className="d-flex justify-content-center">
                        {control.map((element)=>{
                            return ( <span
                                style={paginatorStyle}
                                onClick={()=>changePage(element.url)}
                                >{element.label}
                                </span>);
                        })}
                    </div>
                </>
            }

        </div>
    )
}
export default Table;
