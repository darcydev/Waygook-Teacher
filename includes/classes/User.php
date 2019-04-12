<?php

class User {

    protected $db;
    protected $data;
    private $errorArray;
    private $userLoggedIn;

    private $userID;
    private $first_name;
    private $last_name;
    private $username;
    private $email;
    private $profile_pic;
    private $description;

    public function __construct($userLoggedIn) {
        $this->db = MyPDO::instance();
        $this->errorArray = array();
        // REFACTOR: do I have to pass '$userLoggedIn' in here, or can I
        // simply use $_SESSION['userLogggedIn'] here?
        $this->userLoggedIn = $userLoggedIn;

        $sql = "SELECT * FROM Users WHERE username = ?";
        $stmt = $this->db->run($sql, [$userLoggedIn]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userID = $row['userID'];
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->username = $row['username'];
        $this->email = $row['email'];
        $this->profile_pic = $row['profile_pic'];
        $this->description = $row['description'];
    }

    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    public function getID() {
        return $this->userID;
    }

    public function getUserIDs() {
        // create an array that holds all userIDs
        // $array = array();
        $sql = "SELECT userID FROM Users";
        $stmt = $this->db->run($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhoto() {
        return $this->profile_pic;
    }

    public function getDescription () {
        return $this->description;
    }

    public function getOtherUser($id) {
        $sql = "SELECT * FROM Users WHERE userID = ?";
        $stmt = $this->db->run($sql, [$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getLessons($id) {
        // fetch all lessons associated with this Employment
        $sql = "SELECT * FROM Lessons
                WHERE employment_id = ?
                ORDER BY datetime DESC";
        $stmt = $this->db->run($sql, [$id]);
        $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lessons;
    }

    public function getUnconfirmedLessons($id) {
        $sql = "SELECT * FROM Lessons
                WHERE confirmed = ?
                AND (teacher_id = ? OR student_id = ?)
                ORDER BY datetime DESC";
        $stmt = $this->db->run($sql, [0, $id, $id]);
        $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lessons;
    }

    public function getReviews($id) {
        // fetch all reviews associated with User
        $sql = "SELECT * FROM Reviews
                WHERE teacher_id = ?
                OR student_id = ?";
        $stmt = $this->db->run($sql, [$id, $id]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reviews;
    }

    public function updateDescription($desc) {
		$this->validateDescription($desc);

        if (empty($this->errorArray) == true) {
            $sql = "UPDATE Users SET description = ? WHERE userID = ?";
            $stmt = $this->db->run($sql, [$desc, $this->userID]);
            $rowsAffected = $stmt->rowCount();
            return $rowsAffected;
        }
    }

    private function validateDescription($desc) {
		// check description length
		if (strlen($desc) > 5000) {
			array_push($this->errorArray, Constants::$descriptionCharacters);
            return;
        }
	}

    public function updateProfilePic($db_uploadPath, $fileExtension, $fileSize, $uploadPath) {
        $this->validateProfilePic($fileExtension, $fileSize, $uploadPath);

        if (empty($this->errorArray) == true) {
            $sql = "UPDATE Users SET profile_pic = ? WHERE userID = ?";
            $stmt = $this->db->run($sql, [$db_uploadPath, $this->userID]);
            $rowsAffected = $stmt->rowCount();
            return $rowsAffected;
        }
    }

    private function validateProfilePic($fileExtension, $fileSize, $uploadPath) {
        echo "<script>console.log('vPP 1')</script";
        // check file extension
        if (! in_array($fileExtension, ['jpeg', 'jpg', 'png'])) {
            array_push($this->errorArray, Constants::$invalidFileExtension);
            return;
        }
        // check file size
        if ($fileSize > 2000000) {
            array_push($this->errorArray, Constants::$invalidFileSize);
            return;
        }
        // check file name
        if (file_exists($uploadPath)) {
            array_push($this->errorArray, Constants::$invalidFileName);
        }
    }

    public function updatePassword($old_pw, $new_pw, $new_pw2) {
        $this->validateOldPassword($old_pw);
        $this->validatePasswords($new_pw, $new_pw2);

        if (empty($this->errorArray) == true) {
            $sql = "UPDATE Users
                    SET password = ?
                    WHERE userID = ?";
            $stmt = $this->db->run($sql, [$new_pw, $this->userID]);
            $rowsAffected = $stmt->rowCount();
            return $rowsAffected;
        }
    }

    private function validateOldPassword($pw) {
        // check password correct
        $sql = "SELECT userID, password FROM Users WHERE userID = ? AND password = ?";
        $query = $this->db->run($sql, [$this->userID, $pw]);
        // BUG: "rowCount()" is not for a SELECT query (https://stackoverflow.com/questions/40355262/pdo-rowcount-only-returning-one)
        if ($query->rowCount() == 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$passwordIncorrect);
            return false;
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

    public function insertMessage($message_text, $to_user_id) {
        $this->validateMessage($message_text);

        if (empty($this->errorArray) == true) {
            $sql = "INSERT INTO Messages VALUES (messageID, ?, ?, ?, ?)";
            $stmt = $this->db->run($sql, [
                $this->userID, // from_user_id
                $to_user_id, // to_user_id
                $message_text, // message_content
                date("Y-m-d H:i:s") // date
            ]);
            $rowsAffected = $stmt->rowCount();
        } else {
            $rowsAffected = 0;
        }
        return $rowsAffected;
    }

    private function validateMessage($messageText) {
        // TODO: insert code...
        // fe, ensure that User has actually entered a message (perhaps validate with min. characters?)
        return;
    }

    public function updateTimezone($tz) {
        $sql = "UPDATE Users SET timezone = ? WHERE userID = ?";
        $stmt = $this->db->run($sql, [$tz, $this->userID]);
        $rowsAffected = $stmt->rowCount();
        return $rowsAffected;
    }

}
?>
