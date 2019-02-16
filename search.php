<?php
include("includes/header.php");

/*
SEARCH BAR CODE

The below operates the code for the search-teacher-form
Essentially, everytime that User submits the form, I update the sql query
and refresh the page with the new query
*/
// TODO: I suspect that this is a very inefficient way of doing this
if (isset($_POST['search-teacher-button'])) {
    // TODO: consider whether to move this into a class
    // get the values from the form
    $by_nation = $_POST['by_nationality'];
    echo $by_nation;

    $sql = "SELECT * FROM Users WHERE role = ?";
    $conditions = array();
    // check if the User included 'all' for any of the form values
    if ($by_nation !== 'all') {
        $conditions[] = "AND nationality='$by_nation'";
    }
    // if the User searched for anything other than 'all' for any of the values
    // include those vales in a WHERE clause in $sql
    if (count($conditions) > 0) {
        $sql .= " " . implode($conditions);
    }
} else {
    // default search query (unless amended by search-teacher-form)
    // select 30 random Teachers to display on page
    $sql = "SELECT * FROM Users
            WHERE role = ?
            ORDER BY RAND() LIMIT 30";
}
$stmt = $db->run($sql, ['teacher']);
$teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="search-container">
    <div id="search-bar">
        <p>INSERT SEARCH BAR</p>
        <form class="search-teacher-form" method="post">
            <table>
                <tr>
                    <td>
                        <label>Nationality</label>
                        <select id="by_nationality" name="by_nationality" type="text">
                            <option value="all">All</option>
                            <option value="american">American</option>
                            <option value="australian">Australian</option>
                            <option value="british">British</option>
                            <option value="canadian">Canadian</option>
                            <option value="filipino">Filipino</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" name="search-teacher-button">SEARCH</button>
        </form>
    </div>
    <div id="search-results-container">
        <ul class="search-result-list">
            <?php
            foreach ($teachers as $row) {
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
                                        " . $row['nationality'] . "
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
