<?php
include_once("../model/Employee.php");
$empObject = new Employee();
// function for provide data to dropdown in add product page

if (isset($_POST['viewSup'])) {
    header('Content-Type: application/json');
    echo json_encode($empObject->getEmpRole());
}