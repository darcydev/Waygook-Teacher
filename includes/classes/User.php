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

    public function insertMessage($messageText, $to_user_id) {
        $this->validateMessage($messageText);

        if (empty($this->errorArray) == true) {
            $sql = "INSERT INTO Messages VALUES (messageID, ?, ?, ?, ?)";
            $stmt = $this->db->run($sql, [
                $this->userID, // from_user_id
                $to_user_id, // to_user_id
                $messageText, // message_content
                date("Y-m-d H:i:s") // date
            ]);
            $rowsAffected = $stmt->rowCount();
            return $rowsAffected;
        }
    }

    private function validateMessage($messageText) {
        // TODO: insert code...
        // fe, ensure that User has actually entered a message (perhaps validate with min. characters?)
    }
}

?>
