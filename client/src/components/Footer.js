import React from "react";

import ListItem from "./ListItem";

export default function Footer() {
  const ITEMS = ["contact", "about us", "faq's", "support"];

  const LINKS_MARKUP = ITEMS.map(
    /* TODO: insert href link */
    /* TOOD: insert classes */
    (item) => <ListItem classes="INSERT CLASSES" name={item} link="#" />
  );

  return (
    /* TODO: include style */
    <footer className="site-footer">
      <div className="container">
        <div className="site-footer-inner">
          <div className="brand footer-brand">
            {/* TODO: not working */}
            <img src="/Waygook-Teacher/public/images/logo.png" alt="logo" />
          </div>
          <ul className="footer-links list-reset">{LINKS_MARKUP}</ul>
        </div>
      </div>
    </footer>
  );
}
