// GENERIC function to append a parameter to a URL
// takes the name of the parameter (key)
// and the value of the parameter (value)
function updateURL(key, value) {
  let param = `?${key}=${value}`;
  window.history.pushState('', '', param);
}