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


        /*
        // select all userIDs
        $sql = "SELECT userID FROM Users";
        $query = mysqli_query($this->con, $sql);
        // create array to hold userIDs
        $array = array();
        */
        /*
        while($row = mysqli_fetch_array($query)) {
            array_push($array, $row['userID']);
        }
        return $array;
        */
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

    public function updateDescription($desc_update) {
        // BUG: if $desc_update includes ' or ", it doesn't update
        // $this->userID = that of currently loggedIn user.
        $sql = "UPDATE Users SET description='{$desc_update}' WHERE userID='{$this->userID}'";
        $result = mysqli_query($this->con, $sql)
            or die (mysqli_error($this->con));
        $rows_affected = mysqli_affected_rows($this->con);
        return $rows_affected;
    }

    public function updateProfilePic($db_uploadPath) {
        $sql = "UPDATE Users SET profile_pic='{$db_uploadPath}' WHERE userID='{$this->userID}'";
        $result = mysqli_query($this->con, $sql)
            or die (mysqli_error($this->con));
        $rows_affected = mysqli_affected_rows($this->con);
        return $rows_affected;
    }

}

?>
