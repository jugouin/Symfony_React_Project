import React, {useState} from 'react';
import Possession from './Possession';


export default function PossessionShow(props) {

    const possessionsObject = Object.entries(props);
    const [possessions, setPossessions] = useState(JSON.parse(possessionsObject[0][1]));

    console.log(possessions)

    return <>
        <div className="card w-75 m-auto mt-3">
            <div className="card-body text-center">
                <h1 className='text-center m-3'>Possessions de {possessions.name}</h1>
                <table className="container table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Valeur</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>
                            <Possession
                            key={possessions.id}
                            id={possessions.id} 
                            name={possessions.name}
                            value={possessions.value}
                            type={possessions.type}
                            />
                        </tbody>
                </table>
            </div>
        </div>
    </>
}