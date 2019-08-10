import Tabs from "Waygook-Teacher/src/views/React/Tabs";

// import React, { Component } from 'react';

/*

var myElement = React.createElement;

export default class LoginRegisterModal extends Component {
  render() {
    return (
      <div className="modal-dialog cascading-modal">
        <div className="modal-content">
          <div className="modal-c tabs">
            <ul className="nav  nav-tabs md-tabs tabs-2 light-blue darken-1">
              <li className="nav-item">
                <a href="" className="nav-link active">
                  Login
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    );
  }
}


var loginRegisterContainer = document.querySelector("#modalLRForm");
ReactDOM.render(myElement(LoginRegisterModal), loginRegisterContainer); */

/* const e = React.createElement;

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return "You liked this.";
    }

    return e(
      "button",
      { onClick: () => this.setState({ liked: true }) },
      "Like"
    );
  }
}

const domContainer = document.querySelector("#like_button_container");
ReactDOM.render(e(LikeButton), domContainer); */

// let myElement = React.createElement;

/* export default class App extends Component {
  state = {
    formDisplayed: "login",
    formSuccess: false
  }; */

class LoginRegisterModal extends React.Component {
  state = {
    formDisplayed: "login",
    formSuccess: false,
  };

  loginUser = (loginState) => {
    const email = loginState.email;
    const password = loginState.password;
    const firstName = loginState.firstName;
  };

  registerTabClicked = () => {
    this.setState({
      formDisplayed: "register",
    });
  };

  loginTabClicked = () => {
    this.setState({
      formDisplayed: "login",
    });
  };

  render() {
    return (
      <Tabs
        registerTabClicked={this.registerTabClicked}
        loginTabClicked={this.loginTabClicked}
      />
    );
  }
}

ReactDOM.render(
  React.createElement(LoginRegisterModal),
  document.querySelector("#modalLRForm")
);
