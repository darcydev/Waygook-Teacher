/* TODO:
** scroll on the contact list
** scroll on message container
** click on contact = open that message container
** press enter in textarea = send message (via DOM) and (via PHP SQL w/ AJAX)
** press enter on searchbar = search contacts for that input
*/

// TODO: use AJAX to open the specific conversation
/* function getOtherUser(otherUserID) {
  $.ajax({
    url: '/Waygook-Teacher/src/controllers/ajax/getOtherUser.php',
    type: 'POST',
    data: ({ otherUserID: otherUserID }),
    success: function (response) {
      /// document.querySelector("#conversation-header-name").src = data['profile_picture'];
      console.log(response);
      document.querySelector("#conversation-header-name").innerHTML = response.first_name;
    }
  });
}; */

function fetchUserDetails(otherID) {
  var formData = new FormData();
  formData.append("otherID", otherID);

  fetch('/Waygook-Teacher/src/controllers/ajax/getOtherUser.php', {
    method: 'POST',
    body: formData
  })
    .then(res => res.json())
    .then(data => updateHeader(data))
    .catch(e => console.log(`Error: ${e}`))
}

function fetchConversation(otherID) {
  var formData = new FormData();
  formData.append("otherID", otherID);

  fetch('/Waygook-Teacher/src/controllers/ajax/getConversation.php', {
    method: 'POST',
    body: formData
  })
    .then(res => res.json())
    .then(data => updateConversation(data, otherID))
    .catch(e => console.log(`Error: ${e}`))
}

function updateHeader(data) {
  document.querySelector("#conversation-header-name").innerHTML = data.first_name;
  document.querySelector("#conversation-header-photo").innerHTML = data.profile_pic;
}

function updateConversation(data, otherID) {
  // TODO: clear all messages

  let allMsg = data.map(x => x);
  // iterate of each message individually
  allMsg.map(function (x) {
    // for the purposes of adding correct classes,
    // determine whether each message has been sent by 'userLoggedIn' or 'otherUser'
    let type = (x.from_user_id === otherID) ? 'reply' : 'sent';

    // create each of the Elements
    let div = document.createElement('div');
    div.classList.add('message', type);
    let p = document.createElement('p');
    div.appendChild(p);

    // add the message text from each message
    p.innerHTML = x.message_content;

    document.querySelector('#messages').appendChild(div);
  });
}