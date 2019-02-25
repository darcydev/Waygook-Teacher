<?php
include("includes/config.php");
include("includes/classes/MyPDO.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
include("includes/classes/User.php");

$account = new Account();

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

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
        alert("check");
        document.getElementById("teacher-register-form").style.display = "block";
    } else {
        document.getElementById("teacher-register-form").style.display = "none";
    }
}
</script>

<html>
<head>
    <title>Waygook Teacher</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div id="background">
        <div id="login-container">
            <div id="input-container">
                <form id="login-form" class="register-form" action="register.php" method="post">
                    <h2>Login</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="login-username">Username</label>
                        <input id="login-username" name="login-username" type="text" required>
                    </p>
                    <p>
                        <label for="login-password">Password</label>
                        <input id="login-password" name="login-password" type="password" required>
                    </p>
                    <button type="submit" name="login-button">LOG IN</button>
                </form>
                <form id="register-form" class="register-form" action="register.php" method="post">
                    <h2>Register</h2>
                    <p>
                        <label for="role">Role</label>
                        <select id="role" name="role" type="text" onchange="roleCheck(this);" required>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" value="<?php getInputValue('username') ?>" required>
                    </p>
                    <p>
        				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="first-name">First name</label>
                        <input id="first-name" name="first-name" type="text" value="<?php getInputValue('firstName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="last-name">Last name</label>
                        <input id="last-name" name="last-name" type="text" value="<?php getInputValue('lastName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="<?php getInputValue('email') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" required>
                    </p>
                    <p>
                        <label for="password2">Confirm password</label>
                        <input id="password2" name="password2" type="password" required>
                    </p>
                    <div id="teacher-register-form" class="register-form">
                        <p>
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" type="text">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </p>
                        <p>
                            <label for="nationality">Nationality</label>
                            <select id="nationality" name="nationality" type="text">
                                <option value="american">American</option>
                                <option value="australian">Australian</option>
                                <option value="british">British</option>
                                <option value="canadian">Canadian</option>
                                <option value="southAfrica">South African</option>
                                <option value="filipino">Filipino</option>
                            </select>
                        </p>
                        <p>
                            <label for="educationLevel">Education Level</label>
                            <select id="educationLevel" name="educationLevel" type="text">
                                <option value="teritary">Teritary</option>
                                <option value="diploma">Diploma</option>
                                <option value="bachelor">Bachelor</option>
                                <option value="masters">Masters</option>
                                <option value="doctorate">Doctorate</option>
                            </select>
                        </p>
                        <p>
                            <label for="educationMajor">Education Major</label>
                            <select id="educationMajor" name="educationMajor" type="text">
                                <option value="none">None</option>
                                <option value="education">Education</option>
                                <option value="english">English</option>
                                <option value="business">Business</option>
                                <option value="communication">Communication</option>
                                <option value="engineering">Engineering</option>
                                <option value="maths">Maths</option>
                                <option value="law">Law</option>
                                <option value="social_sciences">Social Sciences</option>
                                <option value="arts">Arts</option>
                                <option value="other">Other</option>
                            </select>
                        </p>
                        <p>
                            <label for="dob">Date of Birth</label>
                            <input id="dob" name="dob" type="date">
                        </p>
                    </div>
                    <button type="submit" name="register-button">SIGN UP</button>
                </form>
            </div>
            <div id="login-text">
                <h1>Study English, right now</h1>
                <h2>Connect with and learn from native English speakers</h2>
                <ul>
                    <li>Study vocabulary and grammar for exams</li>
                    <li>Improve pronounciation with native speaker</li>
                    <li>Prepare for interviews</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
