import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class NavBar extends Component {
  render() {
    return (
      <nav className="navbar sticky-top navbar-expand-lg navbar-default">
        <a className="navbar-brand" href="#">XingApps</a>
        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <i className="fa fa-bars" aria-hidden="true"></i>
        </button>

        <div className="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul className="navbar-nav mr-auto mt-2 mt-lg-0">
            <li className="nav-item active">
              <a className="nav-link" href="#">Home</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="#">Projects</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="#">Contact</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="#">About</a>
            </li>
          </ul>
          <div className="form-inline my-2 my-lg-0">
            <ul className="navbar-nav mr-auto mt-2 mt-lg-0">
              <li className="nav-item">
                <a className="nav-link" href="#">Log In</a>
              </li>
              <li className="nav-item">
                <a className="nav-link" href="#">Sign Up</a>
              </li>
              <li className="nav-item">
                <a className="nav-link" href="#"><i className="fas fa-user-circle"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    );
  }
}

if (document.getElementById('nav-bar')) {
  const el = document.getElementById('nav-bar');
  const props = Object.assign({}, el.dataset);
  ReactDOM.render(<NavBar {...props}/>, document.getElementById('nav-bar'));
}
