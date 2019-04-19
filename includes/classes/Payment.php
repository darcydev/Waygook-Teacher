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

    public function insertIncomingPayment($u_id, $e_id, $amount, $date) {
        if(empty($this->errorArray) == true) {
            $sql = "INSERT INTO Incoming_Payments
                    VALUES (
                        incomingID,
                        :user_id,
                        :employment_id,
                        :amount,
                        :payment_date,
                        :paypal_transaction_id
                    )";
            $stmt = $this->db->run($sql, [
                ':user_id' => $u_id,
                ':user_id' => $u_id,
                ':employment_id' => $e_id,
                ':payment_date' => date('Y-m-d H:i:s'),
                ':paypal_transaction_id' => '1',
            ]);
            $rowsAffected = $stmt->rowCount();
        } else {
            $rowsAffected = 0;
        }
        return $rowsAffected;
    }


    public function createOutgoingPayment($u_id, $e_id, $amount, $date) {
        // TODO: include...
    }



?>
