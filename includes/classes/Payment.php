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
    public function insertIncomingPayment($e_id, $amount) {
        $sql = "INSERT INTO Incoming_Payments
                VALUES (
                    incomingID,
                    :user_id,
                    :employment_id,
                    :amount,
                    :payment_date
                )";
        $stmt = $this->db->run($sql, [
            ':user_id' => $this->userLoggedInID,
            ':employment_id' => $e_id,
            ':amount' => $amount,
            ':payment_date' => date("Y-m-d H:i:s")
        ]);
        $rowsAffected = $stmt->rowCount();
        return $rowsAffected;
    }


    public function insertOutgoingPayment($u_id, $e_id, $amount, $date) {
        // TODO: include...
    }

}
?>
