<?php

session_start();
include_once("../model/User.php");
include_once("../model/Employee.php");
$userObject = new User();
$empObject =  new Employee();

if(isset($_POST['empLoginCheck'])){
    if(isset($_POST['empLoginEmailVal']) && isset($_POST['empLoginPasswordVal'])){
        $empEmail = htmlentities($_POST['empLoginEmailVal'], ENT_QUOTES);
        $empPwd = htmlentities($_POST['empLoginPasswordVal'], ENT_QUOTES);

        //validations 
        if(empty($empEmail) || empty($empPwd)){
            echo 'emptyValue';
            die;
        }

        $userInfo = $userObject->geUserLoginInfo($empEmail);
        $userPwd = $userInfo['UserPassword'];
        
        if($userPwd){
            if(password_verify($empPwd, $userPwd)){
                $userId = $userInfo['UserId'];
                $_SESSION['userId'] = $userId;
                //get employee role 
                $empRole = $empObject->getEmpRoleUserId($userId);
                if($empRole){
                    if($empRole == 1){
                        echo "admin";
                    }else{
                        echo "manager";
                    }
                }else{
                    echo "systemError";
                }
            }else{
                echo 'wrongPassword';
            }
        }else{
            echo 'wrongEmail';
        }
    
    }
}
	