import React from "react";
import styled from "styled-components";

import { Box, Container, Grid, Typography } from "@material-ui/core";

import BlockQuote from "./BlockQuote";

export default function Hero() {
  // MARKUP

  // STYLES
  const StyledContainer = styled(Container)`
    min-height: 60vh;
    margin: 90px;
  `;
  const StyledButton = styled.button`
    border: none;
    border-radius: 2px;
    margin: 12px;
    background: #3525d3;
    color: #ffffff;
    padding: 10px 20px;
    box-shadow: 0 8px 16px rgba(53, 37, 211, 0.24);
  `;

  return (
    <StyledContainer component="section">
      <Typography variant="h2" gutterBottom={true}>
        Welcome to Waygook Teacher
      </Typography>
      <Typography variant="h4" gutterBottom={true}>
        connecting Korean students with expert English teachers
      </Typography>
      <StyledButton>
        <Typography variant="h6">Start learning</Typography>
      </StyledButton>
      <BlockQuote
        text="Through my education, I didn't just develop skills, I didn't just
        develop the ability to learn, but I developed confidence."
        author="Michelle Obama"
      ></BlockQuote>
    </StyledContainer>
  );
}
