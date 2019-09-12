import React, { Component } from "react";
import styled from "styled-components";

import { Box, Container, Grid, Tab, Tabs, Typography } from "@material-ui/core";

export default function Footer() {
  // MARKUP
  const ITEMS = ["contact", "about us", "faq's"];
  const LINKS_MARKUP = ITEMS.map((item) => <Tab label={item} />);

  // STYLES
  const StyledFooter = styled.footer`
    background: #202932;
    color: #889bb0;
    min-height: 40vh;
  `;
  const StyledGrid = styled(Grid)``;
  const StyledGridItem = styled(Grid)`
    display: flex;
    justify-content: center;
    max-width: 70%;
    margin: auto;
  `;

  return (
    <StyledFooter>
      <StyledGrid container>
        <StyledGridItem item xs={12}>
          <img src={require("../assets/images/logo.png")} alt="logo" />
        </StyledGridItem>

        <StyledGridItem item xs={12}>
          <Tabs>{LINKS_MARKUP}</Tabs>
        </StyledGridItem>
      </StyledGrid>
    </StyledFooter>
  );
}
