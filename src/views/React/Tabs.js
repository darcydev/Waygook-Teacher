import React, { Component } from "react";

export default function Tabs() {
  return (
    <ul className="nav nav-pills mb-3 d-flex justify-content-end">
      <li className="nav-link">
        <button
          className="btn"
          type="button"
          onClick={this.props.loginTabClicked}
        >
          Login
        </button>
      </li>
      <li className="btn nav-link" onClick={this.props.registerTabClicked}>
        Register
      </li>
    </ul>
  );
}

/* export default class ModalTabs extends Component {
  /**
   * TODO: create a reuseable function that can be used for either tab click.
   * That is, rather than having two seperate functions (loginTabClicked and registerTabClicked). Instead,
   * simply have one that passes, as a parameter, which tab was clicked on to the App component
   */
/* The function below is an not-working attempt at the above problem  
   handleTabClick = (tabClicked) => {
    this.props.tabClicked({ tabClicked });
  }; */

/*
  render() {
    return (
      <ul className="nav nav-pills mb-3 d-flex justify-content-end">
        <li className="btn nav-link" onClick={this.props.loginTabClicked}>
          Login
        </li>
        <li className="btn nav-link" onClick={this.props.registerTabClicked}>
          Register
        </li>
      </ul>
    );
  }
} */
