import React from "react";

// Components
import Navbar from "./components/Navbar";
import Hero from "./components/Hero";
import Footer from "./components/Footer";

// Pages
import Home from "./pages/Home";

// Styles
/// import "./App.css";

function App() {
  return (
    <div className="App">
      <Navbar />
      <Hero />
      <Home />
      <Footer />
    </div>
  );
}

export default App;
