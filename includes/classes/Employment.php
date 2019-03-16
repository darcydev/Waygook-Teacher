<?php

class Employment {

    protected $db;
    protected $data;
    private $errorArray;
    private $userLoggedInID;
    private $userLoggedInRole;

    public function __construct($userLoggedInID, $userLoggedInRole) {
        $this->db = MyPDO::instance();
        $this->errorArray = array();
        $this->userLoggedInID = $userLoggedInID;
        $this->userLogggedInRole = $userLoggedInRole;
    }

    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    public function insertORupdateEmployment($s_id, $t_id, $deposit) {
        // ON DUPLICATE KEY UPDATE to
        // check if Employment already exists
            // if yes, update with deposit amount
            // if no, create the employment with deposit amount
        $sql = "INSERT INTO Employments
                VALUES (employmentID, ?, ?, ?, ?)";
        // TODO: finish....
    }

    // function to get the particular Employment involving $userLoggedIn and $other_user
    public function getThisEmployment($userLoggedInID, $other_user) {
        $sql = "SELECT * FROM Employments
                WHERE (teacher_id = ? AND student_id = ?)
                OR (teacher_id = ? AND student_id = ?)";
        $stmt = $this->db->run($sql, [$userLoggedInID, $other_user, $other_user, $userLoggedInID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function scheduleLesson($date, $start_time, $duration, $other_user) {
        $this->validateLessonDate($date);
        $row = $this->getThisEmployment($this->userLoggedInID, $other_user);

        // assign correct teacher/student IDs depending on role of userLoggedIn
        if ($this->userLogggedInRole == 'teacher') {
            $teacher_id = $this->userLoggedInID;
            $student_id = $other_user;
        } else {
            $teacher_id = $other_user;
            $student_id = $this->userLoggedInID;
        }

        // calculate variables for sql insertion
        $datetime = $date . " " . $start_time . ":00";
        // TODO: add functionality to adjust this for each Employment (CHECK I HAVEN'T DONE THIS ALREADY)
        $teacher_rate = $row['rate'];
        $waygook_rate = 4.0;
        $teacher_payment = $row['rate'] - $waygook_rate;

        $sql = "INSERT INTO Lessons
                VALUES (lessonID, ?, ?, ?, ?, ?, NULL, ?, ?, ?, DEFAULT)";
        $stmt = $this->db->run($sql,
            [
                $row['employmentID'],
                $teacher_id,
                $student_id,
                $datetime,
                $duration,
                $teacher_rate,
                $waygook_rate,
                $teacher_payment
            ]
        );
        $rowsAffected = $stmt->rowCount();
        // if the DB has been updated successfully
        if ($rowsAffected == 1) {
            // subtract $teacher_rate from Employment's prepaid amount
            $sql = "UPDATE Employments
                    SET prepaid_amount = prepaid_amount - ?
                    WHERE employmentID = ?";
            $stmt = $db->run($sql, [$teacher_rate, $row['employmentID']]);
        }
        return $rowsAffected;
    }

    private function validateLessonDate($date) {
        // get today's date
        $today = date('Y-m-d');
        // convert today's date to time and add 60 days
        $max_date = strtotime('60 day', strtotime($today));
        // convert back to date
        $max_date = date('Y-m-d', $max_date);
        // conver today's date to time and minus 10 days
        $min_date = strtotime('-10 day', strtotime($today));
        // convert back to time
        $min_date = date('Y-m-d', $min_date);

        // check $date is within $max_date / $min_date range
        if ($date > $min_date && $date < $max_date) {
            // pass
        } else {
            array_push($this->errorArray, Constants::$invalidLessonDate);
            return;
        }
    }

}
?>
