<?php

include_once("UserDataValidateFunctions.php");
include_once("../model/User.php");
include_once("../model/Employee.php");
$userObject = new User();
$empObject = new Employee();

if (isset($_POST['checkEmpRegFlag'])) {
    if (isset($_POST['empFname']) && isset($_POST['empLname']) && isset($_POST['empNIC']) && isset($_POST['empPhone']) && isset($_POST['empEmail']) && isset($_POST['empAddress']) && isset($_POST['empRole'])) {
        $empFname = htmlentities($_POST['empFname'], ENT_QUOTES);
        $empLname = htmlentities($_POST['empLname'], ENT_QUOTES);
        $empNIC = htmlentities($_POST['empNIC'], ENT_QUOTES);
        $empPhone = htmlentities($_POST['empPhone'], ENT_QUOTES);
        $empEmail = htmlentities($_POST['empEmail'], ENT_QUOTES);
        $empAddress = htmlentities($_POST['empAddress'], ENT_QUOTES);
        $empRole = (int)htmlentities($_POST['empRole'], ENT_QUOTES);
        $flag = true;

        //emp types 
        /**
         * 1 = admin
         * 2 = manager
         */

         //user types
         /**
          * 1 = employee
          * 2 = customer 
          */

        //name validation
        if (!validateName($empFname)) {
            $flag = false;
            echo "invalid first name";
        }

        if (!validateName($empLname)) {
            $flag = false;
            echo "invalid last name";
        }

        if (!validateNIC($empNIC)) {
            $flag = false;
            echo "invalid NIC";
        }

        if (!validatePhone($empPhone)) {
            $flag = false;
            echo "invalid Phone";
        }

        if (!validateEmail($empEmail)) {
            $flag = false;
            echo "invalid Email";
        }

        if (!(!empty($empAddress) && $empAddress != "" && strlen(trim($empAddress)) > 0)) {
            $flag = false;
            echo "invalid Address";
        }

        if($empRole == 0){
            $flag = false;
            echo "invalid Role";
        }

        if ($flag) {
            //generate password
            $empPassword = password_hash($empNIC, PASSWORD_DEFAULT);
            //insert data to the user table 
            $userId = $userObject->addUser($empPassword, $empEmail, 1, true);
            if($userId){
                $addEmployee = $empObject->addEmployee($empFname, $empLname, $empNIC, $empPhone, $empAddress, $userId, $empRole);
                if($addEmployee){
                    echo 'successfully added';
                }else{
                    echo 'technicalError';
                }
            }else{
                echo 'technicalError';
            }
        }
    } else {
        echo "Please submit again";
    }
}
