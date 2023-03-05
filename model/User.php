<?php

include_once('DbConnection.php');

class User {

    private $userId;
    private $userEmail;
    private $userPassword;
    private $userType;
    private $userStatus;
    private $dbCon;

    //start the db connection
    public function __construct()
    {
        try {
            $this->dbCon = new mysqli(SERVER, USER, PASSWORD, DATABASE);
            return $this->dbCon;
        } catch (Exception $e) {
            echo "Connection Failed" . $e->getMessage();
        }
    }

    // insert data into the user table
    public function addUser($userPassword, $userEmail, $userType, $userStatus)
    {
        $this->userPassword = $this->dbCon->real_escape_string($userPassword);
        $this->userEmail = $this->dbCon->real_escape_string($userEmail);
        $this->userType = $this->dbCon->real_escape_string($userType);
        $this->userStatus = $this->dbCon->real_escape_string($userStatus);

        $sqlQuery = "INSERT INTO `user`(`UserEmail`, `UserPassword`, `UserType`, `UserStatus`) VALUES 
                    (
                     '" . $this->userEmail . "',
                     '" . $this->userPassword . "',
                     '" . $this->userType . "',
                     '" . $this->userStatus . "'
                    )";

        $executeQuery = $this->dbCon->query($sqlQuery);
        if ($executeQuery) {
            return $this->dbCon->insert_id;  // fetch the user id from the DB
        } else {
            return false;
        }
    }

}


