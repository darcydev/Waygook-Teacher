<?php
class Constants {
	// "public" means that it's avaliable outside the class
	// "static" means that you don't have to create an instance of a class first.

	// reigster error message
	public static $passwordsDoNotMatch = "Passwords don't match";
	public static $passwordNotAlphaNumeric = "Password can only contain numbers and letters";
	public static $passwordCharacters = "Password must be between 5 and 30 characters";
	public static $emailInvalid = "Email is invalid";
	public static $emailsDoNotMatch = "Emails don't match";
	public static $emailTaken = "Email already exists";
	public static $lastNameCharacters = "Last name must be between 2 and 25 characters";
	public static $firstNameCharacters = "First name must be between 2 and 25 characters";
	public static $usernameCharacters = "Username must be between 5 and 25 characters";
	public static $usernameTaken = "Username already exists";
    public static $skypeNameCharacters = "A valid Skype username must be between 6 and 32 characters";

    // login error messages
	public static $loginFailed = "Username or Password was incorrect";
}
?>
