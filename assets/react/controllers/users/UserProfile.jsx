import React from "react";
import Possession from "../possessions/Possession.jsx";

export default function UserProfile(props){

   // let userPossessions = USERS[userId].possessions

    const userObject = Object.entries(props)
    let user = JSON.parse(userObject[0][1]);
    let possessions = JSON.parse(userObject[1][1]);

    if (possessions !== null){
        console.log(possessions);
    } else {
        console.log('A des nope');
    }
 
    return <>
        <div className="card w-75 m-auto mt-3">
            <div className="link-dark d-flex justify-content-between w-75 m-auto mt-4">
                <a className="link-dark" href="/users"><span className="material-symbols-outlined">arrow_back</span></a>
            </div>
            <div className="card-body text-center">
                    <h1 className='text-center m-3'>Utilisateur n°{user.id}</h1>
                    <p className="p-3">{user.prenom} {user.nom}</p>
                    <p className="p-3">Email: {user.email}</p>
                    <p className="p-3">Adresse: {user.adresse}</p>
                    <p className="p-3">Téléphone: {user.tel}</p>
                    <p className="p-3">Âge: {user.age} ans</p>
            </div>
        </div>
        <div className="card w-75 m-auto mt-3">
            <div className="card-body text-center">
                <h1 className='text-center m-3'>Possessions de {user.prenom} {user.nom}</h1>
                <table className="container table">
                    <tbody>
                        {possessions.map(possession => (
                            <Possession
                                key={possession.id}
                                id={possession.id} 
                                name={possession.name}
                                value={possession.value}
                                type={possession.type}
                                userId={possession.userId}
                            />))}
                    </tbody>
                </table>
            </div>
        </div>
    </>
};

