<?php

class Payment {

    protected $db;
    protected $data;
    private $errorArray;
    private $userLoggedInID;

    public function __construct($userLoggedInID) {
        $this->db = MyPDO::instance();
        $this->errorArray = array();
        $this->userLoggedInID = $userLoggedInID;
    }

    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    // function to get the particular Incoming Payment
    public function getThisIncomingPayment($userLoggedInID) {
        // TODO: include...
    }

    public function getThisOutgoingPayment($userLoggedInID) {
        // TODO: include...
    }

    // function to get all Incoming_Payments from a particular User
    public function getAllIncomingPayments($userLoggedInID) {
        // TODO: include...
    }

    // function to get all Outgoing_Payments to a particular User
    public function getAllOutgoingPayments($userLoggedInID) {
        // TODO: include...
    }

    // insert a deposit into the DB
    public function insertIncomingPayment($u_id, $e_id, $amount, $date) {
    //// public function insertIncomingPayment($u_id, $e_id, $amount) {
        $sql = "INSERT INTO Incoming_Payments
                VALUES (
                    incomingID,
                    :user_id,
                    :employment_id,
                    :amount,
                    :payment_date
                )";
        $stmt = $this->db->run($sql, [
            ':user_id' => $u_id,
            ':employment_id' => $e_id,
            ':amount' => $amount,
            ':payment_date' => $date
        ]);
        $rowsAffected = $stmt->rowCount();
        return $rowsAffected;
        /*
        // if there are no errors with the variables to be inserted
        if (empty($this->errorArray) == true) {
            // insert into db
            $sql = "INSERT INTO Incoming_Payments
                    VALUES (
                        incomingID,
                        :user_id,
                        :employment_id,
                        :amount,
                        :payment_date
                    )";
            $stmt = $this->db->run($sql, [
                ':user_id' => $u_id,
                ':employment_id' => $e_id,
                ':amount' => $amount,
                ':payment_date' => $date
            ]);
            $rowsAffected = $stmt->rowCount();
            mail("darcyeprice@hotmail.com", "iIP 2.1", "test");
        } else {
            $rowsAffected = 0;
        }
        // return the number of rows affected by the sql query
        mail("darcyeprice@hotmail.com", "iIP 3", "test");
        return $rowsAffected;*/
    }


    public function insertOutgoingPayment($u_id, $e_id, $amount, $date) {
        // TODO: include...
    }

}
?>
