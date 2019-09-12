import React, { Fragment } from "react";
import styled from "styled-components";

export default function BlockQuote({ text, author }) {
  // STYLES
  const Wrapper = styled.div`
    margin: 300px 50px 10px 50px;
  `;
  const BlockQuote = styled.blockquote`
    color: #889bb0;
    font-style: italic;
    margin-top: 24px;
    margin-bottom: 24px;
    margin-left: 24px;
    font-size: 28px;
    line-height: 42px;
    letter-spacing: -0.1px;
  `;
  const Author = styled.p`
    font-style: italic;
    font-size: 1.5em;
    text-align: right;
    margin-right: 10px;
  `;

  return (
    <Wrapper>
      <BlockQuote>"{text}"</BlockQuote>
      <Author> - {author}</Author>
    </Wrapper>
  );
}
