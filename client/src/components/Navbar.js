import React from "react";

export default function Navbar() {
  return (
    <header className="site-header">
      <nav className="navbar navbar-expand-lg navbar-dark primary-color">
        <button
          className="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#basicExampleNav"
          aria-controls="basicExampleNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse" id="basicExampleNav">
          <ul className="navbar-nav mr-auto">
            <li className="nav-item active">
              <a className="nav-link" href="/Waygook-Teacher/public/index.php">
                WaygookTeacher
                <span className="sr-only">(current)</span>
              </a>
            </li>
            <li className="nav-item">
              <a
                id="profile-nav-link"
                className="nav-link"
                href="/Waygook-Teacher/src/views/profile.php"
              >
                Profile
              </a>
            </li>
            <li className="nav-item">
              <a
                id="inbox-nav-link"
                className="nav-link"
                href="/Waygook-Teacher/src/views/inbox.php"
              >
                Inbox
              </a>
            </li>
            <li className="nav-item">
              <a
                id="search-nav-link"
                className="nav-link"
                href="/Waygook-Teacher/src/views/search.php"
              >
                Search
              </a>
            </li>
            <li className="nav-item">
              <a
                id="calendar-nav-link"
                className="nav-link"
                href="/Waygook-Teacher/src/views/calendar.php"
              >
                Calendar
              </a>
            </li>
            <li className="nav-item">
              <a
                id="login-nav-link"
                className="nav-link"
                href="#"
                data-toggle="modal"
                data-target="#auth-modal"
              >
                Login/Register
              </a>
              <a
                id="logout-nav-link"
                className="nav-link"
                href="/Waygook-Teacher/src/views/logout.php"
              >
                Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  );
}
