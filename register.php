<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<html>
    <head>
        <title>Waygook Teacher: add PDO</title>

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
