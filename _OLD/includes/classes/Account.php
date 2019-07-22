<?php
class Account {

	protected $db;
    protected $data;
    private $errorArray;

	public function __construct() {
        $this->db = MyPDO::instance();
        $this->errorArray = array();
    }

	public function getError($error) {
		if(!in_array($error, $this->errorArray)) {
			$error = "";
		}
		return "<span class='errorMessage'>$error</span>";
	}

	public function loginAccount($un, $pw) {
		$sql = "SELECT username, password FROM Users
				WHERE username = ? AND password = ?";
		$query = $this->db->run($sql, [$un, $pw]);
		// BUG: "rowCount()" is not for a SELECT query (https://stackoverflow.com/questions/40355262/pdo-rowcount-only-returning-one)
		if ($query->rowCount() == 1) {
			return true;
		} else {
			array_push($this->errorArray, Constants::$loginFailed);
            return false;
		}
	}

	public function registerAccount(
		$role, $fn, $ln, $un, $em,
		$pw, $pw2, $skype_name, $gender, $nationality,
		$flag, $edu_level, $edu_major, $dob, $rate
	) {
		$this->validateUsername($un);
		$this->validateFirstName($fn);
		$this->validateLastName($ln);
		$this->validateEmail($em);
		$this->validatePasswords($pw, $pw2);
		// TODO: validate skype name

		if(empty($this->errorArray) == true) {
            // insert into db
			$sql = "INSERT INTO Users
					VALUES (
						userID,
						:first_name,
						:last_name,
						:username,
						:email,
						:password,
						DEFAULT,
						NULL,
						:role,
						:gender,
						:nationality,
						:flag,
						:education_level,
						:education_major,
						:DOB,
						:rate,
						:skype_name,
						:lesson_hours,
						NULL,
						:account_balance,
						DEFAULT
					)";
            $stmt = $this->db->run($sql, [
				':first_name' => $fn,
				':last_name' => $ln,
				':username' => $un,
				':email' => $em,
				':password' => $pw,
				':role' => $role,
				':gender' => $gender,
				':nationality' => $nationality,
				':flag' => $flag,
				':education_level' => $edu_level,
				':education_major' => $edu_major,
				':DOB' => $dob,
				':rate' => $rate,
				':skype_name' => $skype_name,
				':lesson_hours' => 0,
				':account_balance' => 0
			]);
            $rowsAffected = $stmt->rowCount();
        } else {
            $rowsAffected = 0;
        }
		return $rowsAffected;
    }

	private function validateUsername($un) {
		// check username length
        if (strlen($un) > 50 || strlen($un) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
		// check username unique
        $sql = "SELECT username FROM Users WHERE username = ?";
        $stmt = $this->db->run($sql, [$un]);
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
			array_push($this->errorArray, Constants::$emailTaken);
			return;
		}
	}

	private function validatePasswords($pw, $pw2) {
		// check passwords match
		if($pw != $pw2) {
			array_push($this->errorArray, Constants::$passwordsDoNoMatch);
			return;
		}
		// check password alphanumberic
		if(preg_match('/[^A-Za-z0-9]/', $pw)) {
			array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
			return;
		}
		// check password length
		if(strlen($pw) > 50 || strlen($pw) < 5) {
			array_push($this->errorArray, Constants::$passwordCharacters);
			return;
		}
	}
}
?>