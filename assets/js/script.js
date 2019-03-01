// TODO: consider whether to include jQuery from footer.php here
// I don't think it's appropriate, becuase in footer.php, I use
// a call to the sql db


// execute as soon as the document is ready
$(document).ready(function() {

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
    $("#down-btn").click(function () {
        $('.tr-sub-table').css('display', 'table-row');
        $('#down-btn').css('display', 'none');
        $('#up-btn').css('display', 'inline-block');
    });
    // OPPOSITE OF ABOVE: if User on up-btn on lessons-list, collapse up lesson list details
    $("#up-btn").click(function () {
        $('.tr-sub-table').css('display', 'none');
        $('#up-btn').css('display', 'none');
        $('#down-btn').css('display', 'inline-block');
    });
});
