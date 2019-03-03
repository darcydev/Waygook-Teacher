<?php

class Employment {

    protected $db;
    protected $data;
    private $errorArray;
    private $userLoggedInID;
    private $userLoggedInRole;

    private $employmentID;
    private $teacher_id;
    private $student_id;
    private $prepaid_amount;
    private $rate;

    public function __construct($userLoggedInID, $userLoggedInRole) {
        $this->db = MyPDO::instance();
        $this->errorArray = array();
        $this->userLoggedInID = $userLoggedInID;
        $this->userLogggedInRole = $userLoggedInRole;

        /*

        $sql = "SELECT * FROM Employments
                WHERE teacher_id = ?
                OR student_id = ?";
        $stmt = $this->db->run($sql, [$userLoggedInID, $userLoggedInID]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->employmentID = $row['employmentID'];
        // $this->teacher_id = $row['teacher_id'];
        // $this->student_id = $row['student_id'];
        $this->prepaid_amount = $row['prepaid_amount'];
        $this->rate = $row['rate'];
        */
    }

    // TODO: include getError function

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
        // TODO: add functionality to adjust this for each Employment
        $teacher_rate = $row['rate'];
        $waygook_rate = 4.0;
        $teacher_payment = $row['rate'] - $waygook_rate;
        $confirmed = 0;

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
        return $rowsAffected;
    }

    private function validateLessonDate($date) {
        // TODO:
    }

    private function validateLessonTime($start_time) {
        // TODO:
    }
}
?>
