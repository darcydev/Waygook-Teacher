<?php

class User {

    private $con;
    private $userID;
    private $first_name;
    private $last_name;
    private $username;
    private $email;
    private $profile_pic;
    private $description;

    public function __construct($con, $userID) {
        $this->con = $con;
        $this->userID = $userID;

        $sql = "SELECT * FROM Users WHERE userID='$this->userID'";
        $query = mysqli_query($this->con, $sql);
        $user = mysqli_fetch_array($query);

        $this->first_name = $user['first_name'];
        $this->last_name = $user['last_name'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->profile_pic = $user['profile_pic'];
        $this->description = $user['description'];
    }

    public function getID() {
        return $this->userID;
    }

    public function getUserIDs() {
        // select all userIDs
        $sql = "SELECT userID FROM Users";
        $query = mysqli_query($this->con, $sql);
        // create array to hold userIDs
        $array = array();
        while($row = mysqli_fetch_array($query)) {
            array_push($array, $row['userID']);
        }
        return $array;
    }

    public function getFirstName() {
        /// $query = mysqli_query($this->con, "SELECT first_name FROM Users WHERE userID='$this->userID'");
        /// $user = mysqli_fetch_array($query);
        /// return $user['first_name'];
        return $this->first_name;
    }

    public function getLastName() {
        /// $query = mysqli_query($this->con, "SELECT last_name FROM Users WHERE userID='$this->userID'");
        /// $user = mysqli_fetch_array($query);
        /// return $user['last_name'];
        return $this->last_name;
    }

    public function getUsername() {
        /// $query = mysqli_query($this->con, "SELECT username FROM Users WHERE userID='$this->userID'");
        /// $user = mysqli_fetch_array($query);
        /// return $user['username'];
        return $this->username;
    }

    public function getEmail() {
        /// $query = mysqli_query($this->con, "SELECT email FROM Users WHERE userID='$this->userID'");
        /// $user = mysqli_fetch_array($query);
        /// return $user['email'];
        return $this->email;
    }

    public function getPhoto() {
        /// $sql = "SELECT profile_pic FROM Users WHERE userID='$this->userID'";
        /// $query = mysqli_query($this->con, $sql);
        /// $user = mysqli_fetch_array($query);
        /// return $user['profile_pic'];
        return $this->profile_pic;
    }

    public function getDescription () {
        return $this->description;
    }

    public function updateDescription($desc_update) {
        /// $userID = $this->userID;
        /// echo $userID;
        $sql = "UPDATE Users SET description='{$desc_update}' WHERE userID='{$this->userID}'";
        /// $sql = "UPDATE Users SET description='{$desc_update}' WHERE userID=2";
        $result = mysqli_query($this->con, $sql)
            or die (mysqli_error($this->con));
        $rows_affected = mysqli_affected_rows($this->con);
        echo $rows_affected;
        return $result;
    }

}

?>
