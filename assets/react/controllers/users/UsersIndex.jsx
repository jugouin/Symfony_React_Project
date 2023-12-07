import React, {useState} from 'react';
import axios from 'axios';
import User from './User';

export default function UsersIndex(props) {

    const usersObject = Object.entries(props);
    const [users, setUsers] = useState(JSON.parse(usersObject[0][1]));

    console.log(users)

    function deleteUser(id) {
      setUsers(users.filter(user => user.id !== id));
      axios.post(`https://localhost:8000/users/${id}`);
    }

    return <>
    
      <h1 className='text-center m-3'>Liste des utilisateurs</h1>
      <table className="container table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Tel</th>
            <th>Âge</th>
            <th><a className="link-dark" href="./new"><span className="material-symbols-outlined">add_circle</span></a></th>
          </tr>
        </thead>
        <tbody>
          {users.map(user => (
            <User
              key={user.id}
              id={user.id} 
              nom={user.nom}
              prenom={user.prenom}
              email={user.email}
              adresse={user.adresse}
              tel={user.tel}
              age={user.age}
              deleteUser={deleteUser}
            />
          ))}
        </tbody>
      </table>
    </>
}