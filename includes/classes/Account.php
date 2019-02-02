<?php

class Account {
    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function login($un, $pw) {
        // encyrpt the pw
        $pw = md5($pw);
        // get all rows with same un and pw
        // ISSUE: change 'Students' to 'Users' (or check both Students and Teachers table)
        $query = mysqli_query($this->con, "SELECT * FROM Students WHERE username='$un' AND password='$pw'");
        // if un and pw combination is unique in db
        if(mysqli_num_rows($query) == 1) {
            return true;
        } else {
            // push error message to errorArray
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    public function studentRegister($un, $fn, $ln, $em, $pw, $pw2, $dob, $level, $skype) {
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmail($em);
        $this->validatePasswords($pw, $pw2);
        // haven't incuded validateDOB, Level as their options in the form and therefore didn't think User can enter 'invalid' info
        $this->validateSkypeName($skype);

        if(empty($this->errorArray) == true) {
            // if no errors, insert data into db
            return $this->insertStudentDetails($un, $fn, $ln, $em, $pw, $dob, $level, $skype);
        } else {
            return false;
        }
    }

    public function teacherRegister($un, $fn, $ln, $em, $pw, $pw2, $dob, $nation, $edu, $skype) {
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmail($em);
        $this->validatePasswords($pw, $pw2);
        $this->validateSkypeName($skype);

        if(empty($this->errorArray) == true) {
            // if no errors, insert data into db
            return $this->insertTeacherDetails($un, $fn, $ln, $em, $pw, $dob, $nation, $edu, $skype);
        } else {
            return false;
        }
    }

    public function getError($error) {
        // if registration returns an error, print relevant error message
        if(!in_array($error, $this->errorArray)) {
            // if $error doesn't exist in errorArray, set $error as empty string
            $error = "";
        }
        // return HTML element
        return "<span class='errorMessage'>$error</span>";
    }

    public function insertStudentDetails($un, $fn, $ln, $em, $pw, $dob, $level, $skype) {
        $encryptedPW = md5($pw);
        // insert values into db
        $result = mysqli_query($this->con, "INSERT INTO Students VALUES(studentID, '$un', '$fn', '$ln', '$em', '$encryptedPW', '$dob', '$level', '$skype')");
        return $result;
    }

    public function insertTeacherDetails($un, $fn, $ln, $em, $pw, $dob, $nation, $edu, $skype) {
        $encryptedPW = md5($pw);
        // insert values into db
        $result = mysqli_query($this->con, "INSERT INTO Teachers VALUES(teacherID, '$un', '$fn', '$ln', '$em', '$encryptedPW', '$dob', '$nation', '$edu', '$level', '$skype')");
        return $result;
    }

    private function validateUsername {
        // check username length
        if(strlen($un) > 25 || strlen($un) < 5) {
			array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
        // check username unique
        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM Users WHERE username='$un'");
        if(mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken); // send the error message to the array
            return;
        }
    }

    private function validateFirstName {
        // check first name length
        if(strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }

    }

    private function validateLastName($ln) {
        // check last name length
        if(strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }

    private function validateEmail {
        // check email valid
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }
        // check email unique
        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM Users WHERE email='$em'");
        if(mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }

    }

    private function validatePasswords($pw, $pw2) {
        if(preg_match('/[^A-Za-z0-9]/', $pw)) {
            array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
            return;
        }
        if(strlen($pw) > 30 || strlen($pw) < 5) {
            array_push($this->errorArray, Constants::$passwordCharacters);
            return;
        }
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDoNotMatch);
            return;
        }
    }

    private function validateSkypeName($skype) {
        // TODO: check skype name unavailable. See here: https://stackoverflow.com/questions/8951625/skype-username-validation

        // check first name length
        if(strlen($skype) > 32 || strlen($fn) < 7) {
            array_push($this->errorArray, Constants::$skypeNameCharacters);
            return;
        }
    }

}

?>
