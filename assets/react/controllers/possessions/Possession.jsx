import React from 'react';
import { Component } from "react";

export default class Possession extends Component{
    
    render(){
        return(
            <tr key={this.props.id}>
                <td className="p-3">{this.props.id}</td>
                <td className="p-3"><a className="link-dark" href={`users/${this.props.userId}`}>{this.props.name}</a></td>
                <td className="p-3">{this.props.value} €</td>
                <td className="p-3">{this.props.type}</td>
            </tr>    
        )
    }
}
