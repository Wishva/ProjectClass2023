<?php


class Employee{
    private $empFirstName;
    private $empLastName;
    private $empNIC;
    private $empPhone;
    private $empEmail;
    private $empAddress;

    public function __construct()
    {
        echo 1234;
    }

    public function save($name){
        echo $name;
    }

    public function __destruct()
    {
        echo 789;
    }
}

$obj = new Employee("kamal");

$obj->save("kamal");