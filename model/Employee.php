<?php

include_once("User.php");
class Employee extends User{

    private $empFirstName;
    private $empLastName;
    private $empNIC;
    private $empPhone;
    private $empEmail;
    private $empAddress;
    private $userId;
    private $roleId;
    private $dbCon;

    public function __construct()
    {
        $this->dbCon = parent::__construct();
    }

    // insert data into the user table
    public function addEmployee($empFirstName, $empLastName, $empNIC, $empPhone, $empAddress, $userId, $empRole)
    {
        $this->empFirstName = $this->dbCon->real_escape_string($empFirstName);
        $this->empLastName = $this->dbCon->real_escape_string($empLastName);
        $this->empNIC = $this->dbCon->real_escape_string($empNIC);
        $this->empPhone = $this->dbCon->real_escape_string($empPhone);
        $this->empAddress = $this->dbCon->real_escape_string($empAddress);
        $this->userId = $this->dbCon->real_escape_string($userId);
        $this->roleId = $this->dbCon->real_escape_string($empRole);

        $sqlQuery = "INSERT INTO `employee`(`EmpFirstName`, `EmpLastName`, `EmpNIC`, `EmpPhone`, `EmpAddress`, `UserId`, `RoleId`) VALUES 
                    (
                     '" . $this->empFirstName . "',
                     '" . $this->empLastName . "',
                     '" . $this->empNIC . "',
                     '" . $this->empPhone . "',
                     '" . $this->empAddress . "',
                     '" . $this->userId . "',
                     '" . $this->roleId . "'
                    )";

        $executeQuery = $this->dbCon->query($sqlQuery);
        if ($executeQuery) {
            return true;
        } else {
            return false;
        }
    }

    // function for get employee role details

    public function getEmpRole()
    {
        $sqlQuery = "SELECT * FROM `emprole`;";
        $executeQuery = $this->dbCon->query($sqlQuery);
        $numRows = $executeQuery->num_rows;
        if ($numRows > 0) {
            $roleData = array();
            while ($supResult = $executeQuery->fetch_assoc()) {
                $roleData[] = array(
                    'roleId' => $supResult['RoleId'],
                    'roleName' => $supResult['RoleName'],
                );
            }
            return $roleData;
        } else {
            return false;
        }
    }

    //function to get employee role using user id 

    public function getEmpRoleUserId($userId)
    {
        $sqlQuery = "SELECT RoleId FROM `employee` WHERE UserId = '".$userId."';";
        $executeQuery = $this->dbCon->query($sqlQuery);
        $numRows = $executeQuery->num_rows;
        if ($numRows > 0) {
            $result = $executeQuery->fetch_assoc();
            return $result['RoleId'];
        } else {
            return false;
        }
    }



    public function __destruct()
    {
        //TODO add the code to close the connection
    }
}

$obj = new Employee();

print_r($obj->getEmpRoleUserId(1));
