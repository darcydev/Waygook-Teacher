<?php

class User {

    private $con;
    private $userID;

    public function __construct($con, $artistID) {
        $this->con = $con;
        $this->userID = $artistID;
    }

    public function getID() {
        return $this->userID;
    }

    public function getFirstName() {
        $query = mysqli_query($this->con, "SELECT first_name FROM Users WHERE userID='$this->userID'");
        $user = mysqli_fetch_array($query);
        return $user['first_name'];
    }

    public function getLastName() {
        $query = mysqli_query($this->con, "SELECT last_name FROM Users WHERE userID='$this->userID'");
        $user = mysqli_fetch_array($query);
        return $user['last_name'];
    }

    public function getUsername() {
        $query = mysqli_query($this->con, "SELECT username FROM Users WHERE userID='$this->userID'");
        $user = mysqli_fetch_array($query);
        return $user['username'];
    }

    public function getEmail() {
        $query = mysqli_query($this->con, "SELECT email FROM Users WHERE userID='$this->userID'");
        $user = mysqli_fetch_array($query);
        return $user['email'];
    }
}

?>
