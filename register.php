<?php
include("includes/included-files.php");

include("includes/classes/Account.php");
include("includes/classes/User.php");

$account = new Account();

include("includes/handlers/auth-handler.php");

function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<script>
// if User selects 'role=Teacher', show the aspects of the register-form
// that are relevant only to the teacher
function roleCheck(that) {
    if (that.value == "teacher") {
        document.getElementById("teacher-register-form").style.display = "block";
    } else {
        document.getElementById("teacher-register-form").style.display = "none";
    }
}
</script>

<html>
<head>
    <title>Waygook Teacher</title>

    <?php
    include("includes/scripts_and_links.php");
    ?>
</head>
<body>
    <div class="nav-bar">
        <div class="nav-bar-header">
            <?php // TODO: include logo ?>
        </div>
        <ul class="nav-bar-links">
            <li><a href="register.php"><?php echo $lang['login/register']; ?></a></li>
            <?php include("includes/set-lang-form.php"); ?>
        </ul>
    </div>
    <div class="background">
        <div class="auth-forms">
            <form id="login-form" class="login-form auth-form form" method="POST">
                <h2><?php echo $lang['login']; ?></h2>
                <p>
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <label for="login-username"><?php echo $lang['username']; ?></label>
                    <input id="login-username" name="login-username" type="text" required>
                </p>
                <p>
                    <label for="login-password"><?php echo $lang['password']; ?></label>
                    <input id="login-password" name="login-password" type="password" required>
                </p>
                <button type="submit" id="login-button" name="login-button" class="button"><?php echo $lang['login']; ?></button>
                <div id="change-to-register-form" class="change-auth-form"><?php echo $lang['sign up here']; ?></div>
            </form>
            <form id="register-form" class="register-form auth-form form" method="POST">
                <h2><?php echo $lang['register']; ?></h2>
                <p>
                    <label for="role"><?php echo $lang['role']; ?></label>
                    <select id="role" name="role" type="text" class="select" onchange="roleCheck(this);" required>
                        <option value="teacher"><?php echo $lang['teacher']; ?></option>
                        <option value="student"><?php echo $lang['student']; ?></option>
                    </select>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <label for="username"><?php echo $lang['username']; ?></label>
                    <input id="username" name="username" type="text" value="<?php getInputValue('username') ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <label for="first-name"><?php echo $lang['first name']; ?></label>
                    <input id="first-name" name="first-name" type="text" value="<?php getInputValue('firstName') ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <label for="last-name"><?php echo $lang['surname']; ?></label>
                    <input id="last-name" name="last-name" type="text" value="<?php getInputValue('lastName') ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <label for="email"><?php echo $lang['email']; ?></label>
                    <input id="email" name="email" type="email" value="<?php getInputValue('email') ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                    <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                    <?php echo $account->getError(Constants::$passwordCharacters); ?>
                    <label for="password"><?php echo $lang['password']; ?></label>
                    <input id="password" name="password" type="password" required>
                </p>
                <p>
                    <label for="password2"><?php echo $lang['confirm password']; ?></label>
                    <input id="password2" name="password2" type="password" required>
                </p>
                <div id="teacher-register-form" class="register-form">
                    <p>
                        <label for="gender"><?php echo $lang['gender']; ?></label>
                        <select id="gender" name="gender" class="select" type="text">
                            <option value="male"><?php echo $lang['male']; ?></option>
                            <option value="female"><?php echo $lang['female']; ?></option>
                        </select>
                    </p>
                    <p>
                        <label for="nationality"><?php echo $lang['nationality']; ?></label>
                        <select id="nationality" name="nationality" class="select" type="text">
                            <option value="american"><?php echo $lang['american']; ?></option>
                            <option value="australian"><?php echo $lang['australian']; ?></option>
                            <option value="british"><?php echo $lang['british']; ?></option>
                            <option value="canadian"><?php echo $lang['canadian']; ?></option>
                            <option value="southAfrica"><?php echo $lang['south african']; ?></option>
                            <option value="filipino"><?php echo $lang['filipino']; ?></option>
                        </select>
                    </p>
                    <p>
                        <label for="educationLevel"><?php echo $lang['education level']; ?></label>
                        <select id="educationLevel" name="educationLevel" class="select"  type="text">
                            <option value="teritary"><?php echo $lang['tertiary']; ?></option>
                            <option value="diploma"><?php echo $lang['diploma']; ?></option>
                            <option value="bachelor"><?php echo $lang['bachelor']; ?></option>
                            <option value="masters"><?php echo $lang['masters']; ?></option>
                            <option value="doctorate"><?php echo $lang['doctorate']; ?></option>
                        </select>
                    </p>
                    <p>
                        <label for="educationMajor"><?php echo $lang['education major']; ?></label>
                        <select id="educationMajor" name="educationMajor" class="select"  type="text">
                            <option value="none"><?php echo $lang['none']; ?></option>
                            <option value="education"><?php echo $lang['education']; ?></option>
                            <option value="english"><?php echo $lang['english']; ?></option>
                            <option value="business"><?php echo $lang['business']; ?></option>
                            <option value="communication"><?php echo $lang['communication']; ?></option>
                            <option value="engineering"><?php echo $lang['engineering']; ?></option>
                            <option value="maths"><?php echo $lang['maths']; ?></option>
                            <option value="law"><?php echo $lang['law']; ?></option>
                            <option value="social_sciences"><?php echo $lang['social sciences']; ?></option>
                            <option value="arts"><?php echo $lang['arts']; ?></option>
                            <option value="other"><?php echo $lang['other']; ?></option>
                        </select>
                    </p>
                    <p>
                        <label for="dob"><?php echo $lang['date of birth']; ?></label>
                        <input id="dob" name="dob" type="date">
                    </p>
                </div>
                <button type="submit"  id="register-button" name="register-button" class="button"><?php echo $lang['sign up']; ?></button>
                <div id="change-to-login-form" class="change-auth-form"><?php echo $lang['login here']; ?></div>
            </form>
        </div>
    </div>
</body>
</html>
