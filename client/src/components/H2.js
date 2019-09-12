import React from "react";
import styled from "styled-components";

export default function H2({ title }) {
  const Heading = styled.h2`
    font-size: 33px;
    font-weight: 500;
    margin: 0 0 10px 0;
    line-height: 1.2;
    text-align: center;
    text-transform: capitalize;
  `;

  return <Heading>{title}</Heading>;
}
