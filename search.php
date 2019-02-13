<?php
include("includes/header.php");

// select 30 random Teachers to display on page
$sql = "SELECT * FROM Users WHERE role = ? ORDER BY RAND() LIMIT 30";
$stmt = $db->run($sql, ['teacher']);
$randomTeachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="search-container">
    <div id="search-bar">
        <p>INSERT SEARCH BAR</p>
    </div>
    <div id="search-results-container">
        <ul class="search-result-list">
            <?php
            foreach ($randomTeachers as $row) {
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

<?php
include("includes/footer.php");
?>
