import React from "react";
import styled from "styled-components";

import { Box, Container, Grid, Typography } from "@material-ui/core";

export default function SectionHeading({ title, subtitle }) {
  const SectionHeadingWrapper = styled.div`
    text-align: center;
    margin: 48px 0 64px 0;
  `;

  const SectionSubHeading = styled.p`
    padding: 0 72px;
    margin-bottom: 0;
  `;

  return (
    <SectionHeadingWrapper>
      <Typography variant="h2">{title}</Typography>
      <SectionSubHeading>{subtitle}</SectionSubHeading>
    </SectionHeadingWrapper>
  );
}
