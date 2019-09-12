import React from "react";
import styled from "styled-components";

import { Box, Container, Grid, Typography } from "@material-ui/core";

export default function FeatureBox({ title, text, icon, alt }) {
  const Feature = styled.div`
    padding: 12px;
    width: 276px;
    max-width: 276px;
    flex-grow: 1;
    text-align: center;
  `;

  const FeatureInner = styled.div`
    position: relative;
    height: 100%;
    background: #fff;
    padding: 40px 24px;
    box-shadow: 0 16px 48px rgba(32, 41, 5);
  `;

  const FeatureIcon = styled.div`
    display: flex;
    justify-content: center;
  `;

  const FeatureText = styled.p``;

  return (
    <Feature>
      <FeatureInner>
        <FeatureIcon>
          <img
            src={icon}
            alt={alt}
            style={{ height: "auto", maxWidth: "100%" }}
          ></img>
        </FeatureIcon>
        <Typography variant="h4">{title}</Typography>
        <FeatureText>{text}</FeatureText>
      </FeatureInner>
    </Feature>
  );
}
