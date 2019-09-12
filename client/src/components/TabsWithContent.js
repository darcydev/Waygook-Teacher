import React, { Fragment } from "react";
import styled from "styled-components";
// MUI
import { Container, Box, Grid, Tab, Tabs, Typography } from "@material-ui/core";
// MUI Icons

export default function TabsWithContent({ content }) {
  // STATE
  const [value, setValue] = React.useState(0);
  const handleChange = (event, newValue) => setValue(newValue);

  // STYLES

  // MARKUP
  const TAB_BUTTON_MARKUP = content.map((item) => (
    <Tab label={item.title} icon={item.icon} />
  ));

  const TAB_TEXT_MARKUP = content.map((e, index) => (
    <Container variant="div">
      <Typography variant="h4" hidden={value !== index} align="center">
        {content[index].subtitle}
      </Typography>
      <Typography
        id={`tab-content-${index}`}
        component="p"
        align="center"
        role="tabpanel"
        variant="subtitle1"
        hidden={value !== index}
      >
        {content[index].text}
      </Typography>
    </Container>
  ));

  return (
    <Grid container justify="center">
      <Tabs
        orientation="vertical"
        indicatorColor="secondary"
        textColor="primary"
        onChange={handleChange}
        aria-label="tabs with clickable content"
      >
        {TAB_BUTTON_MARKUP}
      </Tabs>
      <Box maxWidth="70%" marginLeft="20px" alignSelf="center">
        {TAB_TEXT_MARKUP}
      </Box>
    </Grid>
  );
}
