import React, { Fragment } from "react";
import styled from "styled-components";
// MUI
import { Box, Grid, Tab, Tabs, Typography } from "@material-ui/core";
// MUI Icons

import H2 from "./H2";
import H4 from "./H4";
import SectionHeading from "./SectionHeading";

const TabContent = ({ title, text, value, index }) => {
  return (
    <Fragment>
      <Typography variant="h4" hidden={value !== index} align="center">
        {title}
      </Typography>
      <Typography
        id={`tab-content-${index}`}
        component="p"
        align="center"
        role="tabpanel"
        variant="subtitle1"
        hidden={value !== index}
        label="text"
        labelStyle={{ fontSize: "20px" }}
      >
        {text}
      </Typography>
    </Fragment>
  );
};

export default function TabsWithContent({ content }) {
  const [value, setValue] = React.useState(0);

  const handleChange = (event, newValue) => setValue(newValue);

  const MARKUP = content.map((item) => (
    <Tab label={item.title} icon={item.icon} />
  ));

  return (
    <Grid container spacing={4} justify="center">
      <Tabs
        orientation="vertical"
        indicatorColor="secondary"
        textColor="primary"
        onChange={handleChange}
        aria-label="tabs with clickable content"
      >
        {MARKUP}
      </Tabs>
      <Box maxWidth="70%" marginLeft="20px" alignSelf="center">
        <TabContent
          title={content[0].subtitle}
          text={content[0].text}
          value={value}
          index={0}
        />
        <TabContent
          title={content[1].subtitle}
          text={content[1].text}
          value={value}
          index={1}
        />
        <TabContent
          title={content[2].subtitle}
          text={content[2].text}
          value={value}
          index={2}
        />
      </Box>
    </Grid>
  );
}
