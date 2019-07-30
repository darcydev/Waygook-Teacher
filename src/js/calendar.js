/* // IIF!
// Use AJAX to fetch all lessons associated with userLoggedIn, and display them on calendar.php
(function fetchLessons() {
  fetch('/Waygook-Teacher/src/controllers/ajax/getLessons.php', {
    method: 'POST'
  })
    .then(res => res.json())
    .then(data => updateCalendar(data))

    .catch(e => console.log(`Error: ${e}`))
}());

function updateCalendar(data) {
  // remove all preexisting lessons (child nodes) within #agenda
  document.querySelector('#agenda').innerHTML = '';

  // FIXME: is this best practice?
  let domString =
    `<div id='lessonID' class='row row-striped'>
      <div class='col-2 text-right'>
        <h1 class='display-4'><span id='date' class='badge badge-secondary'></span></h1>
        <h2 id='month'>OCT</h2>
      </div>
      <div class='col-10'>
        <h3 id='with'></h3>
        <ul class='list-inline'>
          <li id='time' class='list-inline-item'></li>
          <i class="far fa-clock"></i>
          <li id='duration' class='list-inline-item'></li>
          <li id='skype' class='list-inline-item'><i class='fab fa-skype' aria-hidden='true'></i></li>
        </ul>
      </div>
    </div>`;

  var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];



  // FIXME: combine into oneliner of two maps ?
  let allLessons = data.map(x => x);
  // iterate over each lesson
  allLessons.map(x => {
    // create DOM from the string
    // FIXME: best practice? seems like worst practice...
    document.querySelector('#agenda').innerHTML += domString;

    var lessonDate = new Date(x.datetime);
    console.log(lessonDate);

    // update the DOM with the relevant details from each lesson
    document.querySelector('#date').innerHTML = lessonDate.getDate();
    document.querySelector('#month').innerHTML = months[lessonDate.getMonth()];
    document.querySelector('#with').innerHTML = 'otherUser FirstName';
    document.querySelector('#time').innerHTML = `${lessonDate.getHours()}:${lessonDate.getMinutes()} (KST)`;
    document.querySelector('#duration').innerHTML = `${x.duration} minutes`;
  });
} */
