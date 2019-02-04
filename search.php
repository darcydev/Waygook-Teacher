<?php
include("includes/header.php");

/*
$userID_array = $user->getUserIDs();
$c = 1;
foreach($userID_array as $userID) {
    $userFirstName = $user->getFirstName();

    echo "<li class='search-list-row'>
            <div class='user-photo'>
                <img src= " . $user->getPhoto() . " alt='user-photo'>
            </div>
            <div class='result-user-info'>
                <div class='result-user-name'>
                </div>
                <div class='result-user-email'>
                </div>
            </div>
        </li>";
    // increment counter
    $c = $c + 1;
}
*/
?>

<?php

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

$user = new User($con, $userID);

$userQuery = mysqli_query($con, "SELECT * FROM Users WHERE username='$userLoggedIn'");
$row = mysqli_fetch_array($userQuery);
$userID = $row['userID'];
?>

<div id="search-container">
    <div id="search-bar">
        <p>Hello</p>
    </div>
    <div id="search-results-container">
        <ul class="search-result-list">
            <?php
            // select random users
            $sql = "SELECT * FROM Users ORDER BY RAND() LIMIT 10";
            $query = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($query)) {
                // create html div each time loops through $query
                echo "<div id='search-view-item'>
                        <span id='search-result'>
                            <div class='user-photo'>
        						<img src='" . $row['profile_pic'] . "'>
                            </div>
                            <div class='result-user-name'>
                                " . $row['first_name'] . "
                            </div>
                            <div class='result-user-email'>
                            </div>
                        </span>
                    </div>";
            }
            ?>
        </ul>
    </div>
</div>

<?php include("includes/footer.php") ?>
