import React from "react";

export default function ListItem({ id, name, liClasses, aClasses, link }) {
  return (
    <li className={liClasses}>
      <a id={id} className={aClasses} href={link}>
        {name}
      </a>
    </li>
  );
}
