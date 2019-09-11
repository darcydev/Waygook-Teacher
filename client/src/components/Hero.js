import React, { Component } from "react";

export default class Hero extends Component {
  /* TODO: include scroll revleaing JS contained in the original index.js file */
  render() {
    return (
      <section className="hero">
        <div className="hero-left-decoration is-revealing"></div>
        <div className="hero-right-decoration is-revealing"></div>
        <div className="container">
          <div className="hero-inner">
            <div className="hero-copy">
              <h1 className="hero-title mt-0 is-revealing">
                Welcome to WaygookTeacher
              </h1>
              <p className="hero-paragraph is-revealing">
                The platform to connect Korean students with expert English
                teachers.
              </p>
              <p className="hero-cta mb-0 is-revealing">
                <a
                  className="button button-primary button-shadow"
                  href="#"
                  data-toggle="modal"
                  data-target="#modalLRForm"
                >
                  Start learning
                </a>
              </p>
            </div>
            <div className="hero-illustration"></div>
          </div>
        </div>
      </section>
    );
  }
}
