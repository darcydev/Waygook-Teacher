<?php
include("includes/header.php");

// prevent Teachers from viewing this page (also handled in jQuery.php)
// direct them to index-teacher.php
if ($userLoggedInRow['role'] == 'teacher') {
    header("Location: index-teacher.php");
}

/* SEARCH BAR */
/*
The below operates the code for the search-teacher-form
Essentially, everytime that User submits the form, I update the sql query
and refresh the page with the new query
*/
// TODO: I suspect that this is a very inefficient way of doing this
if (isset($_POST['search-teacher-button'])) {
    // TODO: consider whether to move this into a class
    // BUG: if search returns 0 results, page doesn't load. Instead, load <div class='no-results-found'>
    // get the values from the form
    // BUG: these values are being passed into sql directly directy (without going through PDO)
    $by_nation = $_POST['by_nationality'];
    $by_gender = $_POST['by_gender'];
    $by_education_level = $_POST['by_education_level'];

    $sql = "SELECT * FROM Users WHERE role = ?";
    $conditions = array();
    // check if the User included 'all' for any of the form values
    if ($by_nation !== 'all') {
        // BUG: this line could cause issues -- it's working, but I deviated from StackOverflow Answer
        $conditions[] = " AND nationality='$by_nation'";
    }
    if ($by_gender !== 'all') {
        $conditions[] = " AND gender='$by_gender'";
    }
    if ($by_education_level !== 'all') {
        $conditions[] = " AND education_level='$by_education_level'";
    }
    // if the User searched for anything other than 'all' for any of the values
    // include those vales in a WHERE clause in $sql
    if (count($conditions) > 0) {
        $sql .= " " . implode($conditions);
        /// $sql .= " ORDER BY userID";
    }
    $sql .= " ORDER BY userID";
} else {
    // default search query (unless amended by search-teacher-form)
    // select 30 random Teachers to display on page
    $sql = "SELECT * FROM Users
            WHERE role = ?
            ORDER BY userID";
}
// run the $sql query (derived from above)
$stmt = $db->run($sql, ['teacher']);
$teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// unset session variables for search criteria
unset($_SESSION['$by_nation']);
unset($_SESSION['$by_gender']);
unset($_SESSION['$by_education_level']);

/* PAGINATION */
if ((isset($_GET['page_num']))) {
    $page_num = $_GET['page_num'];
} else {
    $page_num = 1;
}
// calculate number of rows in data
$num_rows = count($teachers);
// number of rows per page
$rows_per_page = 12;
// calculate the last page number
$last_page = ceil($num_rows/$rows_per_page);
// ensure the page number isn't less than 1, or more than max pages
if ($page_num < 1) {
    $page_num = 1;
} elseif ($page_num > $last_page) {
    $page_num = $last_page;
}

// LIMIT sql query to limit results to amount for that page
$limit = ' LIMIT ' . ($page_num - 1) * $rows_per_page . ', ' . $rows_per_page;
// add the limit to the (original) sql query
$sql .= $limit;
// run the $sql query (derived from above)
$stmt = $db->run($sql, ['teacher']);
$data_for_this_page = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="profile-info-container settings-profile-container">
    <div class="side-nav">
        <div id="search-bar">
            <form class="search-teacher-form auth-form form" method="post">
                <label><?php echo $lang['nationality']; ?></label>
                <select id="by_nationality" class="select" name="by_nationality" type="text">
                    <option value="all"><?php echo $lang['all']; ?></option>
                    <option value="american"><?php echo $lang['american']; ?></option>
                    <option value="australian"><?php echo $lang['australian']; ?></option>
                    <option value="british"><?php echo $lang['british']; ?></option>
                    <option value="canadian"><?php echo $lang['canadian']; ?></option>
                    <option value="filipino"><?php echo $lang['filipino']; ?></option>
                </select>
                <label><?php echo $lang['gender']; ?></label>
                <select id="by_gender"  class="select" name="by_gender" type="text">
                    <option value="all"><?php echo $lang['all']; ?></option>
                    <option value="male"><?php echo $lang['male']; ?></option>
                    <option value="female"><?php echo $lang['female']; ?></option>
                </select>
                <label><?php echo $lang['education level']; ?></label>
                <select id="by_education_level"  class="select" name="by_education_level" type="text">
                    <option value="all"><?php echo $lang['all']; ?></option>
                    <option value="teritary"><?php echo $lang['tertiary']; ?></option>
                    <option value="diploma"><?php echo $lang['diploma']; ?></option>
                    <option value="bachelor"><?php echo $lang['bachelor']; ?></option>
                    <option value="masters"><?php echo $lang['masters']; ?></option>
                    <option value="doctorate"><?php echo $lang['doctorate']; ?></option>
                </select>
                <button type="submit" class="button" name="search-teacher-button"><?php echo $lang['search']; ?></button>
            </form>
        </div>
    </div>
    <div class="profile-content settings-profile-content">
        <div class="box">
            <div class="box-content">
                <div class="profile-text-container">
                    <div class="search-results-container">
                        <ul class="search-result-list">
                            <?php
                            foreach ($data_for_this_page as $row) {
                                // create html div each time loops through $query
                                echo "<div class='search-view-item'>
                                        <span id='search-result'>
                                            <a href='profile.php?userID=" . $row['userID'] . "'>
                                                <div class='profile-photo-medium'>
                                                    <img src='" . $row['profile_pic'] . "'>
                                                </div>
                                                <div class='profile-content'>
                                                    <div class='profile-name'>
                                                        " . $row['first_name'] . "
                                                    </div>
                                                    <div class='profile-stats-container'>
                                                        <div class='profile-content profile-flag'>
                                                            <img src='" . $row['flag'] . "'>
                                                        </div>
                                                        <div class='profile-content profile-edu-level'>
                                                            " . $row['education_level'] . "
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </span>
                                    </div>";
                            }
                            ?>
                        </ul>
                        <?php
                        /* PAGE LINKS */
                        // create the variables
                        $previous = $page_num - 1;
                        $next = $page_num + 1;
                        // show User what page their on, and the total number of pages
                        echo "<div class='page-links'>
                                <div class='page-links-button'>
                                    <a class='button' href='search.php'> << </a>
                                    <a class='button' href='search.php?page_num=$previous'> < </a>
                                </div>
                                <div class='page-links-info'>
                                    " . $page_num . " of " . $last_page . " " . "
                                </div>
                                <div>
                                    <a class='button' href='search.php?page_num=$next'> > </a>
                                    <a class='button' href='search.php?page_num=$last_page'> >> </a>
                                </div>
                            </div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
