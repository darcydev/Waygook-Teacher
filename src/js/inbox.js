function fetchUserDetails(otherID) {
  var formData = new FormData();
  formData.append("otherID", otherID);

  fetch("/Waygook-Teacher/src/controllers/ajax/getOtherUser.php", {
    method: "POST",
    body: formData
  })
    .then((res) => res.json())
    .then((data) => updateHeader(data))
    .catch((e) => console.log(`Error: ${e}`));
}

function fetchConversation(otherID) {
  var formData = new FormData();
  formData.append("otherID", otherID);

  fetch("/Waygook-Teacher/src/controllers/ajax/getConversation.php", {
    method: "POST",
    body: formData
  })
    .then((res) => res.json())
    .then((data) => updateConversation(data, otherID))

    .catch((e) => console.log(`Error: ${e}`));
}

function updateHeader(data) {
  document.querySelector("#conversation-header-name").innerHTML =
    data.first_name;
  document.querySelector("#conversation-header-photo").src = data.profile_pic;
  document.querySelector("#conversation-header-a").href += data.userID;
}

function updateConversation(data, otherID) {
  // remove all preexisting messages (child nodes) within #messages
  document.querySelector("#messages").innerHTML = "";

  let allMsg = data.map((x) => x);
  // iterate of each message individually
  allMsg.map(function(x) {
    // for the purposes of adding correct classes,
    // determine whether each message has been sent by 'userLoggedIn' or 'otherUser'
    let type = x.from_user_id === otherID ? "reply" : "sent";

    // create each of the Elements
    let div = document.createElement("div");
    div.classList.add("message", type);
    let p = document.createElement("p");
    div.appendChild(p);

    // add the message text from each message
    p.innerHTML = x.message_content;

    document.querySelector("#messages").appendChild(div);
  });

  // GENERIC function (is in main.js) to append a param to URL
  updateURL("userID", otherID);
}
