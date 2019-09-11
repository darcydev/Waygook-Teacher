import React from "react";

import ListItem from "./ListItem";

export default function Navbar() {
  const NAV_HEADINGS = [
    "profile",
    "inbox",
    "search",
    "calendar",
    "login",
    "logout"
  ];

  const LIST_ITEM_MARKUP = NAV_HEADINGS.map((navItem) => (
    /* TODO: insert href link */
    <ListItem
      id={`${navItem}-nav-link`}
      name={navItem}
      liClasses="nav-item"
      aClasses="nav-link"
      link="INSERT LINK"
    />
  ));

  return (
    <header className="site-header">
      <nav className="navbar navbar-expand-lg navbar-dark primary-color">
        <button
          className="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#basicExampleNav"
          aria-controls="basicExampleNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse" id="basicExampleNav">
          <ul className="navbar-nav mr-auto">{LIST_ITEM_MARKUP}</ul>
        </div>
      </nav>
    </header>
  );
}
