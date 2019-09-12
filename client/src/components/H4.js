import React from "react";
import styled from "styled-components";

export default function H4({ title }) {
  const Heading = styled.h4`
    font-size: 22px;
    font-weight: 300;
    margin: 0 0 10 0;
    line-height: 1.2;
    text-transform: capitalize;
  `;

  return <Heading>{title}</Heading>;
}
