import React from "react";
import styled from "styled-components";

import H2 from "./H2";

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
      <H2 title={title} />
      <SectionSubHeading>{subtitle}</SectionSubHeading>
    </SectionHeadingWrapper>
  );
}
