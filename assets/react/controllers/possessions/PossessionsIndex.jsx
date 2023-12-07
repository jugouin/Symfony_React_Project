import React, {useState} from 'react';
import Possession from './Possession';


export default function PossessionsIndex(props) {

    const possessionsObject = Object.entries(props);
    const [possessions, setPossessions] = useState(JSON.parse(possessionsObject[0][1]));

    console.log(possessions);

    return <>
    
      <h1 className='text-center m-3'>Liste des possessions</h1>
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
          {possessions.map(possession => (
            <Possession
              key={possession.id}
              id={possession.id} 
              name={possession.name}
              value={possession.value}
              type={possession.type}
              user_id={possession.user_id}
            />
          ))}
        </tbody>
      </table>
    </>
}