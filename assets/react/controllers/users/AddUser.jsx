import React from 'react';


export default function AddUser() {

    return <>
        <div class="link-dark d-flex w-75 m-auto mt-4">
            <a class="link-dark align-self-center " href="{{ path('app_users_index') }}">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <h1 class="text-center p-4"><strong>Créer un nouvel utilisateur</strong></h1>
        </div>
    </>

}