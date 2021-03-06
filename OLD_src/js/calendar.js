function confirmLesson(lessonID) {
  var formData = new FormData();
  formData.append("lessonID", lessonID);

  fetch('/Waygook-Teacher/src/controllers/ajax/confirmLesson.php', {
    method: 'POST',
    body: formData
  })
    .then(res => confirmSuccess(lessonID))
    .catch(e => console.log(`Error: ${e}`))
}

function confirmSuccess(lessonID) {
  document.getElementById(lessonID).classList.add('confirmed');
  document.getElementById(lessonID).querySelector('.btn-success').innerText = "Lesson Confirmed";
}

// TODO: reschedule lesson (ajax)
function rescheduleLesson(lessonID) {

}

function cancelLesson(lessonID) {
  var formData = new FormData();
  formData.append("lessonID", lessonID);

  fetch('/Waygook-Teacher/src/controllers/ajax/cancelLesson.php', {
    method: 'POST',
    body: formData
  })
    .then(res => cancelSuccess(lessonID))
    .catch(e => console.log(`Error: ${e}`))
}

function cancelSuccess(lessonID) {
  document.getElementById(lessonID).classList.add('cancelled');
  document.getElementById(lessonID).querySelector('.btn-danger').innerText = "Lesson Cancelled";
}