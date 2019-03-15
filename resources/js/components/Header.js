import React, { Component } from 'react'

export default class Header extends Component {
  render() {
    var NewComponent = React.createClass({
        render: function() {
          return (
      
            <nav className="navbar navbar-expand-lg navbar-dark">
              <a className="navbar-brand" href="#">TinyCloud</a>
              <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon" />
              </button>
              <div className="collapse navbar-collapse" id="navbarSupportedContent">
                <HeaderMenu log={{$log}}/>
                <form className="form-inline my-2 my-lg-0">
                  <input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                  <button className="btn btnCyan my-2 my-sm-0 btn-ci" type="submit">Search <span className="icon-search" /></button>
                </form>
              </div>
            </nav>
          );
        }
      });
  }
}

export default Header
