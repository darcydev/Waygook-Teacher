<?php
class Account {

	protected $db;
    protected $data;
    private $errorArray;

	public function __construct() {
        $this->db = MyPDO::instance();
        $this->errorArray = array();
    }

	public function loginAccount($un, $pw) {
		$sql = "SELECT username, password FROM Users WHERE username = ? AND password = ?";
		$query = $this->db->run($sql, [$un, $pw]);
		// BUG: "rowCount()" is not for a SELECT query (https://stackoverflow.com/questions/40355262/pdo-rowcount-only-returning-one)
		if ($query->rowCount() == 1) {
			return true;
		} else {
			array_push($this->errorArray, Constants::$loginFailed);
            return false;
		}
	}

	public function registerAccount($fn, $ln, $username, $em, $password, $password2) {
		$this->validateUsername($username);
		$this->validateFirstName($fn);
		$this->validateLastName($ln);
		$this->validateEmail($em);
		$this->validatePasswords($password, $password2);

		if(empty($this->errorArray) == true) {
            // insert into db
			$sql = "INSERT INTO Users VALUES (userID, ?, ?, ?, ?, ?, NULL, NULL)";
            $stmt = $this->db->run($sql, [$fn, $ln, $username, $em, $password]);
            $rowsAffected = $stmt->rowCount();
            return $rowsAffected;
        } else {
			echo "<script>console.log('Account 7');</script>";
            $rowsAffected = 0;
            return $rowsAffected;
        }
    }

	public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

	private function validateUsername($username) {
		// check username length
        if (strlen($username) > 50 || strlen($username) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
		// check username unique
        $sql = "SELECT username FROM Users WHERE username = ?";
        $stmt = $this->db->run($sql, [$username]);
        $rowsAffected = $stmt->rowCount();
        if ($rowsAffected != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }

	}

	private function validateFirstName($fn) {
		if(strlen($fn) > 25 || strlen($fn) < 2) {
			array_push($this->errorArray, Constants::$firstNameCharacters);
			return;
		}
	}

	private function validateLastName($ln) {
		if(strlen($ln) > 25 || strlen($ln) < 2) {
			array_push($this->errorArray, Constants::$lastNameCharacters);
			return;
		}
	}

	private function validateEmail($em) {
		if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, Constants::$emailInvalid);
			return;
		}
		// check email unique
		$sql = "SELECT email FROM Users WHERE email = ?";
		$stmt = $this->db->run($sql, [$em]);
		$rowsAffected = $stmt->rowCount();
		if ($rowsAffected != 0) {
			array_push($this->errorArray, Constants::$usernameTaken);
			return;
		}
	}

	private function validatePasswords($password, $password2) {
		// check passwords match
		if($password != $password2) {
			array_push($this->errorArray, Constants::$passwordsDoNoMatch);
			return;
		}
		// check password alphanumberic
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
			return;
		}
		// check password length
		if(strlen($password) > 50 || strlen($password) < 5) {
			array_push($this->errorArray, Constants::$passwordCharacters);
			return;
		}
	}
}
?>
