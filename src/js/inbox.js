/* TODO:
** scroll on the contact list
** scroll on message container
** click on contact = open that message container
** press enter in textarea = send message (via DOM) and (via PHP SQL w/ AJAX)
** press enter on searchbar = search contacts for that input

*/

// TODO: use AJAX to open the specific conversation
function getOtherUser(otherUserID) {
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
};