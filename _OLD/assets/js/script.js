// function to update the deposit amount
// depending upon how many lessons User selects to purchase
function updateAmount(data) {
    deposit_amount = data;
}

// js function that's called by onclick in html
function downLessons(id) {
    // send to jquery function
    jQ_drop_lessons_table(id);
}

// TODO: include popup: "are you sure you want to confirm?"
function confirmLesson(id, duration, t_id, t_pay) {
    // use ajax to make call to PHP script to confirm the lesson
    $.ajax ({
        url: 'includes/handlers/ajax/confirm-lesson.php',
        type: 'POST',
        data: {
            id : id,
            duration: duration,
            t_id: t_id,
            t_pay: t_pay
        },
        error: function(req, textStatus, errorThrown) {
            alert('Error: ' + textStatus + ' ' +errorThrown);
        },
        success: function(id, duration, t_id, t_pay) {
            // TODO: rather than simply reloading the page, change the button into a green tick to indicate lesson has been confirmed
            // if the ajax call has been successful, reload the page
            location.reload();
       }
    });
}

// TODO: include popup: "are you sure you want to cancel?"
function cancelLesson(id) {
    $.ajax ({
        url: 'includes/handlers/ajax/cancel-lesson.php',
        type: 'POST',
        data: { id : id },
        error: function(req, textStatus, errorThrown) {
            alert('Error: ' + textStatus + ' ' +errorThrown);
        },
        // if the ajax call has been successfull
        success: function(id) {
            // TODO: rather than simply reloading the page, change the button into a red cross to indicate lesson has been cancelled
            // reload the page
            location.reload();
       }
    });
}

// execute as soon as the document is ready
$(document).ready(function() {

    // on settings.php, if User clicks item on navbar; change form on display
    $("#nav-settings-password").click(function () {
        document.getElementById("settings-password").style.display = "block";
        document.getElementById("settings-account").style.display = "none";
    });
    $("#nav-settings-account").click(function () {
        document.getElementById("settings-account").style.display = "block";
        document.getElementById("settings-password").style.display = "none";
    });

    // on edit-profile.php, enable User to switch between different tabs
    $('#about-me-nav').click(function () {
        document.getElementById("about-me-form").style.display = "inline-table";
        document.getElementById("contact-info-form").style.display = "none";
        document.getElementById("account-details-form").style.display = "none";
    });
    $('#contact-info-nav').click(function () {
        document.getElementById("contact-info-form").style.display = "inline-table";
        document.getElementById("about-me-form").style.display = "none";
        document.getElementById("account-details-form").style.display = "none";
    });
    $('#account-details-nav').click(function () {
        document.getElementById("account-details-form").style.display = "inline-table";
        document.getElementById("contact-info-form").style.display = "none";
        document.getElementById("about-me-form").style.display = "none";
    });

    // switch between register and login forms
    // if change-to-register-form was clicked, show register form and hide login form
    $('#change-to-register-form').click(function () {
        document.getElementById("login-form").style.display = "none";
        document.getElementById("register-form").style.display = "inline-block";
    });
    // if change-to-login-form was clicked, show login form and hide register form
    $('#change-to-login-form').click(function () {
        document.getElementById("register-form").style.display = "none";
        document.getElementById("login-form").style.display = "inline-block";
    });

    // if User clicks on down-btn lessons-list, show a drop down menu of all lessons associated with that User
    $(".down-btn").click(function () {
        // $('.tr-sub-table').css('display', 'table-row');
        $('.down-btn').css('display', 'none');
        $('.up-btn').css('display', 'inline-block');
    });
    // OPPOSITE OF ABOVE: if User on up-btn on lessons-list, collapse up lesson list details
    $(".up-btn").click(function () {
        $('.tr-sub-table').css('display', 'none');
        $('.up-btn').css('display', 'none');
        $('.down-btn').css('display', 'inline-block');
    });

    // BUG: I'm sure that this is a very complicated and inefficency way of doing this!
    // jquery function to drop the specific table that was clicked on
    // fe, if User clicks on 'Tom', ensures that only Tom's lessons are shown
    jQ_drop_lessons_table = function(id) {
        // make all display:none
        $('.tr-sub-table').css('display', 'none');
        // make that particular sub table display:table-row
        $('#lessons-table-head_' + id).css('display', 'table-row');
        $('#lessons-table-body_' + id).css('display', 'table-row');
        $('.lessons-table-head_' + id).css('display', 'table-row');
        $('.lessons-table-body_' + id).css('display', 'table-row');
    };

    // open / close schedule lesson overlay box
    $('#schedule-lesson-link').click(function () {
        $('#schedule-lesson-form').css('display', 'block');
        $('.background-container').css('opacity', '0.3');
    });
    $('#schedule-lesson-close').click(function () {
        $('#schedule-lesson-form').css('display', 'none');
        $('.background-container').css('opacity', '1');
    });

    // open / close schedule lesson overlay box
    $('#deposit-employment-link').click(function () {
        $('#deposit-employment-container').css('display', 'block');
        $('.background-container').css('opacity', '0.3');
    });
    $('#deposit-employment-close').click(function () {
        $('#deposit-employment-container').css('display', 'none');
        $('.background-container').css('opacity', '1');
    });

});