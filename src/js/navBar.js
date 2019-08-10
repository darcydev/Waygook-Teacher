// Function that controls which navBarLinks are displayed
// takes a boolean of whether the a user is loggedin, or not
function displayNavLinks(isLoggedIn) {
  if (isLoggedIn) {
    document.querySelector("#login-nav-link").style.display = "none";
  } else {
    document.querySelector("#logout-nav-link").style.display = "none";
    document.querySelector("#profile-nav-link").style.display = "none";
    document.querySelector("#inbox-nav-link").style.display = "none";
    document.querySelector("#search-nav-link").style.display = "none";
    document.querySelector("#calendar-nav-link").style.display = "none";
  }
}
