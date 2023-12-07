import { Controller } from '@hotwired/stimulus';
import ReactDOM from 'react-dom';
import React from 'react';
import User from '../react/controllers/users/User.jsx';

export default class extends Controller {
    static values = {
        user: Object
    }
    connect() {
        ReactDOM.render(
            <User user={this.userValue} />,
            this.element
        )
    }
}