// Function that controls which sideBarLinks are displayed. takes a boolean of whether the User is viewing their own profile (true), or not (false)
function displaySideLinks(isOwnProfile) {
  if (isOwnProfile) {
    document.querySelector('#sidebar-message').style.display = "none";
  } else {
    document.querySelector('#sidebar-edit').style.display = "none";
    document.querySelector('#sidebar-settings').style.display = "none";
  }
}

// IIFE to update the sidebar depending upon which page the User is currently on
(function () {
  // determine which page the User is currently on
  var fileName = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);

  // if 'calendar.php', only '#sidebar-schedule' should be visible
  if (fileName === 'calendar.php') {
    document.querySelector('#sidebar-message').style.display = "none";
    document.querySelector('#sidebar-edit').style.display = "none";
    document.querySelector('#sidebar-settings').style.display = "none";
  }
})();
