import React from "react";
// MUI
import {
  Container,
  Button,
  Grid,
  Tab,
  Tabs,
  Typography
} from "@material-ui/core";

// Components
import BlockQuote from "../components/BlockQuote";
import FeatureBox from "../components/FeatureBox";
import SectionHeading from "../components/SectionHeading";
import TabsWithContent from "../components/TabsWithContent";

import SearchIcon from "@material-ui/icons/Search";
import EventIcon from "@material-ui/icons/Event";
import VideoCallIcon from "@material-ui/icons/VideoCall";

export default function Home() {
  const MOTIVATION_CONTENT = [
    {
      title: "expert teachers",
      text:
        "we verify teachers' to ensure that you have access to high-quality English teachers",
      icon: "https://img.icons8.com/clouds/80/000000/medal.png",
      alt: "medal-icon"
    },
    {
      title: "learn at your convience",
      text:
        "take video lessons anytime that suits you. At the office, or in the comfort of your home",
      icon: "https://img.icons8.com/office/80/000000/globe.png",
      alt: "globe-icon"
    },
    {
      title: "boost your skills",
      text:
        "Focus on the skills you need to succeed in your educational, professional, or personal life",
      icon: "https://img.icons8.com/cotton/80/000000/personal-growth.png",
      alt: "personal-growth-icon"
    },
    {
      title: "speak naturally",
      text:
        "Learn from native speakers to speak with confidence and natural English",
      icon: "https://img.icons8.com/officel/80/000000/talk-female.png",
      alt: "speaking-icon"
    }
  ];

  const MOTIVATION_MARKUP = MOTIVATION_CONTENT.map((item) => (
    <FeatureBox
      title={item.title}
      text={item.text}
      icon={item.icon}
      alt={item.alt}
    ></FeatureBox>
  ));

  const HOW_IT_WORKS_CONTENT = [
    {
      title: "find the perfect tutor",
      subtitle: "find",
      text: `WaygookTeacher has many teachers, from around the world, for you to choose from. 
      So that, you're able to find a teacher that is perfect for you! By searching for nationality, 
      level of experience, education level, gender, and price. So that, you can ensure you find
      the perfect tutor for you`,
      icon: <SearchIcon />,
      alt: "search-icon"
    },
    {
      title: "schedule a lesson",
      subtitle: "search",
      text: `We all have busy lives and busy schedules, that's why
      WaygookTeacher has built a platform that allows you to learn
      at anytime that suits you best.
      Schedule a lesson with your teacher at a convenient time for
      you. WaygookTeacher has teachers from around the world, so
      no matter your schedule, you'll be have lessons at a time
      that suits you best.`,
      icon: <EventIcon />,
      alt: "schedule-icon"
    },
    {
      title: "have a lesson on skype",
      subtitle: "skype",
      text: `We use Skype as a platform to conduct lessons, to ensure that all our students can focus on
      learning and not on technical issues. Once the lesson is complete, you are able to confirm the
      lesson on the WaygookTeacher platform.`,
      icon: <VideoCallIcon />,
      alt: "skype-icon"
    }
  ];

  return (
    <main>
      <Container variant="section">
        <SectionHeading title="education broadens the mind" />
        <Grid container justify="center">
          {MOTIVATION_MARKUP}
        </Grid>
      </Container>

      <Container variant="section" style={{ margin: "0 0 40px 0" }}>
        <SectionHeading title="how it works" />
        <TabsWithContent content={HOW_IT_WORKS_CONTENT} />
      </Container>
    </main>
  );
}
