<?php
include("includes/header.php");
?>

<?php
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

/*
$user = new User($con, $userID);

$userQuery = mysqli_query($con, "SELECT * FROM Users WHERE username='$userLoggedIn'");
$row = mysqli_fetch_array($userQuery);
$userID = $row['userID'];
*/
?>

<div id="search-container">
    <div id="search-bar">
        <p>INSERT SEARCH BAR</p>
    </div>
    <div id="search-results-container">
        <ul class="search-result-list">
            <?php
            /*
            // select random users
            $sql = "SELECT * FROM Users ORDER BY RAND() LIMIT 10";
            $query = mysqli_query($con, $sql);
            */
            // $result = User::getUserIDs();
            // echo $result;

            while($row = mysqli_fetch_array($query)) {
                // create html div each time loops through $query
                echo "<div id='search-view-item'>
                        <span id='search-result'>
                            <a href='profile.php?userID=" . $row['userID'] . "'>
                                <div class='search-result-info photo'>
            						<img src='" . $row['profile_pic'] . "'>
                                </div>
                                <div class='search-result-info'>
                                    <div class='info-name'>
                                        " . $row['first_name'] . "
                                    </div>
                                    <div class='info-country'>
                                    </div>
                                    <div class='info-rate'>
                                    </div>
                                    <div class='info-reviews'>
                                    </div>
                                </div>
                            </a>
                        </span>
                    </div>";
            }
            ?>
        </ul>
    </div>
</div>

<?php include("includes/footer.php") ?>
