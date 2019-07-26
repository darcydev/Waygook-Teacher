<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

include("src/views/head.php");
include("src/views/header.php");

include("src/controllers/search.php");
?>

<main class="container inbox flex">

  <!-- SIDE PANEL -->
  <section class="section side-panel">

    <!-- SEARCH BAR -->
    <div class="search header">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input type="text" placeholder="Search contacts..." />
    </div>
    <!-- \.SEARCH BAR -->

    <!-- CONTACTS LIST -->
    <div class="contacts">
      <ul>
        <li class="contact img-xs round">
          <div class="img-xs round">
            <img src="http://emilcarlsson.se/assets/louislitt.png" alt="profile-pic" />
          </div>
          <div class="preview">
            <p class="name">Tom Jones</p>
            <p class="text">You just got LITT up, Mike.</p>
          </div>
        </li>
        <li class="contact img-xs round active">
          <div class="img-xs round">
            <img src="http://emilcarlsson.se/assets/louislitt.png" alt="profile-pic" />
          </div>
          <div class="preview">
            <p class="name">Tom Jones</p>
            <p class="text">You just got LITT up, Mike.</p>
          </div>
        </li>
      </ul>
    </div>

  </section>
  <!-- \.SIDE PANEL -->

  <!-- CONVERSATION -->
  <section class="section conversation">

    <div class="header img-s round">
      <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
      <h5>Harvey Specter</h5>
    </div>

    <div class="messages">
      <ul>
        <li class="sent img-xs round">
          <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
          <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
        </li>
        <li class="reply img-xs round">
          <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
          <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
        </li>
      </ul>
    </div>

    <div class="message-input">
      <input type="text" placeholder="Please write your message...">
      <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
    </div>

  </section>
  <!-- \.CONVERSATION -->

</main>





<script>
  $(".messages").animate({
    scrollTop: $(document).height()
  }, "fast");

  $("#profile-img").click(function() {
    $("#status-options").toggleClass("active");
  });

  $(".expand-button").click(function() {
    $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
  });

  $("#status-options ul li").click(function() {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");

    if ($("#status-online").hasClass("active")) {
      $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
      $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
      $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
      $("#profile-img").addClass("offline");
    } else {
      $("#profile-img").removeClass();
    };

    $("#status-options").removeClass("active");
  });

  function newMessage() {
    message = $(".message-input input").val();
    if ($.trim(message) == '') {
      return false;
    }
    $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
    $('.message-input input').val(null);
    $('.contact.active .preview').html('<span>You: </span>' + message);
    $(".messages").animate({
      scrollTop: $(document).height()
    }, "fast");
  };

  $('.submit').click(function() {
    newMessage();
  });

  $(window).on('keydown', function(e) {
    if (e.which == 13) {
      newMessage();
      return false;
    }
  });
  //# sourceURL=pen.js
</script>