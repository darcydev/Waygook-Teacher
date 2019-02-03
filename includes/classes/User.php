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
        $user = mysqli_fetch_query($query);
        return $user['first_name'];
    }

    public function getLastName() {}

    public function getUsername() {}

    public function getEmail() {}
}

?>
