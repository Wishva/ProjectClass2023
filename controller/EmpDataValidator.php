<?php

include_once("UserDataValidateFunctions.php");

if(isset($_POST['checkEmpRegFlag'])){
   if(isset($_POST['empFname']) && isset($_POST['empLname']) && isset($_POST['empNIC']) && isset($_POST['empPhone']) && isset($_POST['empEmail']) && isset($_POST['empAddress'])){

    $empFname = htmlentities($_POST['empFname'], ENT_QUOTES);
    $empLname = htmlentities($_POST['empLname'], ENT_QUOTES);
    $empNIC = htmlentities($_POST['empNIC'], ENT_QUOTES);
    $empPhone = htmlentities($_POST['empPhone'], ENT_QUOTES);
    $empEmail = htmlentities($_POST['empEmail'], ENT_QUOTES);
    $empAddress = htmlentities($_POST['empAddress'], ENT_QUOTES);
    $flag = true;

    //name validation 
    if(!validateName($empFname)){
        echo "invalid first name";
    }

    if(!validateName($empLname)){
        echo "invalid last name";
    }

    if(!validateNIC($empNIC)){
        echo "invalid NIC";
    }

    if(!validatePhone($empPhone)){
        echo "invalid Phone";
    }

    if(!validateEmail($empEmail)){
        echo "invalid Email";
    }

    if(!(!empty($empAddress) && $empAddress != "" && strlen(trim($empAddress)) > 0)){
        echo "invalid Address";
    }

   }else{
        echo "Please submit again";
   }
}


