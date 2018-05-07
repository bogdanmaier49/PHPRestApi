<?php

include_once(__DIR__ . '/../Service/EmployeeService.php');

class EmployeeController {

    public $service;

    public function __construct () {
        $this->service = new EmployeeService();
    }

    public function findAllEmployees () {
        header('Content-Type: application/json');
        $employees = $this->service->findAll();
        return json_encode($employees);
    }

    public function search ($searchPattern) {
        header('Content-Type: application/json');
        $employees = $this->service->search($searchPattern);
        return json_encode($employees);
    }

    public function addEmployee ($employee) {
        header('Content-Type: application/json');
        if ($this->service->add($employee))
            return json_encode(array("response" => 200));
        return json_encode(array("response" => 402));
    }

    public function removeEmployee ($email) {
        header('Content-Type: application/json');
        if ($this->service->delete($email))
            return json_encode(array("response" => 200));
        return json_encode(array("response" => 402));
    }

    public function updateRole ($email, $roles) {
        header('Content-Type: application/json');
        if ($this->service->updateRole($email, $roles))
            return json_encode(array("response" => 200));
        return json_encode(array("response" => 402));
    }

}

?>