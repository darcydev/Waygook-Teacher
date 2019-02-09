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
        echo "<script>console.log('user 1');</script>";
        $this->db = MyPDO::instance();
        echo "<script>console.log('user 2');</script>";
        // REFACTOR: do I have to pass '$userLoggedIn' in here, or can I
        // simply use $_SESSION['userLogggedIn'] here?
        $this->userLoggedIn = $userLoggedIn;
        echo "<script>console.log('user 3');</script>";

        $sql = "SELECT * FROM Users WHERE username = ?";
        echo "<script>console.log('user 4');</script>";
        $stmt = $this->db->run($sql, [$userLoggedIn]);
        echo "<script>console.log('user 5');</script>";
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<script>console.log('user 6');</script>";
        $this->userID = $row['userID'];
        echo "<script>console.log('user 7');</script>";
        echo $this->userID;


        /*
        $sql = "SELECT * FROM Users WHERE userID='$this->userID'";
        $query = mysqli_query($this->con, $sql);
        $user = mysqli_fetch_array($query);
        */
        /*
        $this->first_name = $user['first_name'];
        $this->last_name = $user['last_name'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->profile_pic = $user['profile_pic'];
        $this->description = $user['description'];
        */
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
