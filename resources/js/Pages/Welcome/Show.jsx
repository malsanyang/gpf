import {useEffect, useState} from "react";

export default function Show({data}){
    useEffect(() => {
        console.debug();
    },[data]);

    return (
        <div>
            <h1 className='text-3xl font-bold underline'>{data.title }</h1>
            <p>this is me</p>
        </div>
    )
}

