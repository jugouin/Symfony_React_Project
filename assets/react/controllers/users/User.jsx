import React from 'react';
import { Component } from "react";

export default class User extends Component{
    
    render(){
        return(
            <tr key={this.props.id}>
                <td className="p-3">{this.props.id}</td>
                <td className="p-3"><a className="link-dark" href={`${this.props.id}`}>{this.props.nom}</a></td>
                <td className="p-3">{this.props.prenom}</td>
                <td className="p-3">{this.props.email}</td>
                <td className="p-3">{this.props.adresse}</td>
                <td className="p-3">{this.props.tel}</td>
                <td className="p-3">{this.props.age} ans</td>
                <td className="p-3">
                    <a className="link-dark" href={`${this.props.id}`}><span className="material-symbols-outlined">visibility</span></a>
                    <button onClick={() => this.props.deleteUser(this.props.id)}><span className="material-symbols-outlined">delete</span></button>
                </td>
            </tr>
        )
    }
}
