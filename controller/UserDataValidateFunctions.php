<?php

// All the validation functions are here

// validate the first name and last name

function validateName($name)
{
    if (preg_match("/^([a-zA-Z']+)$/", $name)) {
        return true;
    } else {
        return false; 
    }
}

// validate nic
function validateNIC($nic)
{
    if (
    preg_match("/^(?:19|20)?\d{2}(?:[0-35-8]\d\d(?<!(?:000|500|36[7-9]|3[7-9]\d|86[7-9]|8[7-9]\d)))\d{4}(?:[vVxX])$/", $nic)
    ) {
        return true;
    } else {
        return false;
    }

}

//validate phone number

function validatePhone($phone)
{
    if (
    preg_match("/^(07[1,2,5,6,7,8][0-9]\d\d\d\d\d\d)$/", $phone)
    ) {
        return true;
    } else {
        return false;
    }
}

// validate password

function validatePwd($pwd)
{
    if (
    preg_match("/(?=^.{6,255}$)((?=.*\d)(?=.*[A-Z])(?=.*[a-z])| 
            (?=.*\d)(?=.*[^A-Za-z0-9])(?=.*[a-z])|(?=.*[^A-Za-z0-9])(?=.*[A-Z]) 
            (?=.*[a-z])|(?=.*\d)(?=.*[A-Z])(?=.*[^A-Za-z0-9]))^.*/", $pwd)
    ) {
        return true;
    } else {
        return false;
    }
}

//validate email

function validateEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }else{
        return true;
    }
}




