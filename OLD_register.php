<?php

// IDEA: seperate register.php pages for student and teacher (ie studentRegister.php and teacherRegister.php)

include("includes/config.php");
//include("includes/classes/Account.php");
include("includes/classes/Constants.php");

//$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name) {
    // if the User has previously completed sections of the form, echo those sections.
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<html>

<head>
	<title>Welcome to Waygook Teacher!</title>

	<link rel="stylesheet" href="assets/css/register.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>

<body>
    <?php

    // if the studentRegister button was pressed, show the 'studentRegister form'
    if(isset($_POST['studentRegisterButton'])) {
        echo '<script>
        		$document.ready(function() {
                	$("#loginForm").hide();
                    $("#studentRegisterForm").show();
                    $("#teacherRegisterForm").hide();
                    $("#loginWelcomeText").hide();
                    $("#studentWelcomeText").show();
                    $("#teacherWelcomeText").hide();
                })
        	</script';
    }
    // if the teacherRegister button was pressed, show the 'teacherRegister form'
    elseif(isset($_POST['teacherRegisterButton'])) {
        echo '<script>
        		$document.ready(function() {
                	$("#loginForm").hide();
                    $("#studentRegisterForm").hide();
                    $("#teacherRegisterForm").show();
                    $("#loginWelcomeText").hide();
                    $("#studentWelcomeText").hide();
                    $("#teacherWelcomeText").show();
                })
        	</script';
    }
    // else, the 'login form'
    else {
        echo '<script>
        		$document.ready(function() {
                	$("#loginForm").show();
                    $("#studentRegisterForm").hide();
                    $("#teacherRegisterForm").hide();
                    $("#loginWelcomeText").show();
                    $("#studentWelcomeText").hide();
                    $("#teacherWelcomeText").hide();
                })
        	</script';
    }

    ?>

    <div id="background">
    	<div id="loginContainer">
    		<div id="inputContainer">
    			<form id="loginForm" action="register.php" method="POST">
    				<h2>Login to Account</h2>
                    <p>
                    	<?php echo $account->getError(Constants::$loginFailed) ?>
                        <label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" value="<?php getInputValue('loginUsername') ?>" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" required>
					</p>
					<button type="submit" name="loginButton">LOG IN</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Sign up here.</span>
					</div>
    			</form>
                <form id="studentRegisterForm" action="register.php" method="POST">
                	<h2>Create Student Account</h2>
                    <p>
                    	<?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" type="text" value="<?php getInputValue('firstName') ?>" required>
                    </p>
                    <p>
                    	<?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" type="text" value="<?php getInputValue('lastName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    	<?php echo $account->getError(Constants::$userNameTaken); ?>
                        <label for="userName">Username</label>
                        <input id="userName" name="userName" type="text" value="<?php getInputValue('userName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" value="<?php getInputValue('email') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" required>
                    </p>
                    <p>
                    	<label for="password2">Confirm password</label>
                        <input id="password2" name="password2" type="password" required>
                    </p>
                    <p>
                        <!-- type="date" is not supported on Safari or IE <= 11 -->
                        <input type="date" name="DOB">
                        <input type="submit">
                    </p>
                    <p>
						<label for="languageLevel">Language Level</label>
                        	<select name="languageLevelOptions">
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                        	</select>
                    </p>
                    <p>
                    	<?php echo $account->getError(Constants::$skypeNameTaken); ?>
                        <label for="skypeName">Skype Username</label>
                        <input id="skypeName" name="skypeName" type="text" value="<?php getInputValue('skypeName') ?>" required>
                    </p>

                    <button type="submit" name="studentRegisterButton">CREATE STUDENT ACCOUNT</button>

                    <div class="hasAccountText">
                    	<span id="hideRegister">Already have an account? Login here</span>
                    </div>
                </form>
                <form id="teacherRegisterForm" action="register.php" method="POST">
                	<h2>Create Teacher Account</h2>
                    <p>
                    	<?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" type="text" value="<?php getInputValue('firstName') ?>" required>
                    </p>
                    <p>
                    	<?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" type="text" value="<?php getInputValue('lastName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    	<?php echo $account->getError(Constants::$userNameTaken); ?>
                        <label for="userName">Username</label>
                        <input id="userName" name="userName" type="text" value="<?php getInputValue('userName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" value="<?php getInputValue('email') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" required>
                    </p>
                    <p>
                    	<label for="password2">Confirm password</label>
                        <input id="password2" name="password2" type="password" required>
                    </p>
                    <p>
                        <!-- type="date" is not supported on Safari or IE <= 11 -->
                        <input type="date" name="DOB">
                        <input type="submit">
                    </p>
                    <p>
                        <label for="nationality">Nationality</label>
                        	<select name="nationalityOptions">
                                <option value="australia">Australia</option>
                                <option value="canada">Canada</option>
                                <option value="ireland">Ireland</option>
                                <option value="newZealand">New Zealand</option>
                                <option value="philippines">Philippines</option>
                                <option value="southAfrica">South Africa</option>
                                <option value="uk">UK</option>
                                <option value="usa">USA</option>
                        	</select>
                    </p>
                    <p>
                    	<label for="educationLevel">Level of Education attained</label>
                        	<input type="radio" name="educationLevelOptions" value="tertiary">Tertiary
                        	<input type="radio" name="educationLevelOptions" value="bachelor">Bachelor
                        	<input type="radio" name="educationLevelOptions" value="masters">Masters
                        	<input type="radio" name="educationLevelOptions" value="doctorate">Doctorate
                    </p>
                    <p>
                    	<?php echo $account->getError(Constants::$skypeNameTaken); ?>
                        <label for="skypeName">Skype Username</label>
                        <input id="skypeName" name="skypeName" type="text" value="<?php getInputValue('skypeName') ?>" required>
                    </p>

                    <button type="submit" name="studentRegisterButton">CREATE TEACHER ACCOUNT</button>

                    <div class="hasAccountText">
                    	<span id="hideRegister">Already have an account? Login here</span>
                    </div>
                </form>
    		</div>
            <div id="welcomeTextContainer">
                <!-- seperate welcomeText for login / student / teacher -->
                <div id="loginWelcomeText" class="welcomeText">
                    <h1>H1 LOGIN INTRO TEXT</h1>
                    <h2>H2 INTRO TEXT</h2>
                </div>
                <div id="studentWelcomeText" class="welcomeText">
                    <h1>H1 STUDENT INTRO TEXT</h1>
                    <h2>H2 INTRO TEXT</h2>
                    <ul>
                        <li>LI INTRO TEXT</li>
                    	<li>LI INTRO TEXT</li>
                    	<li>LI INTRO TEXT</li>
                	</ul>
                </div>
                <div id="teacherWelcomeText" class="welcomeText">
                    <h1>H1 TEACHER INTRO TEXT</h1>
                    <h2>H2 INTRO TEXT</h2>
                    <ul>
                        <li>LI INTRO TEXT</li>
                    	<li>LI INTRO TEXT</li>
                    	<li>LI INTRO TEXT</li>
                	</ul>
                </div>
            </div>
    	</div>
    </div>

</body>

</html>
