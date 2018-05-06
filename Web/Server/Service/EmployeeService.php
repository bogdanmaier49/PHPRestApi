<?php

include_once(__DIR__ . '/../Repository/EmployeeRepository.php');

class EmployeeService {

    private $repository;

    public function __construct () {
        $this->repository = new EmployeeRepository();
    }

    public function add ($employee) {
        if (strlen($employee->getFirstName()) > 0 && 
            strlen($employee->getLastName()) > 0 &&
            strlen($employee->getEmail()) > 0 &&
            strlen($employee->getPassword() > 0) && 
            strlen($employee->getRole()) > 0 &&
            $employee->getAge() > 18 &&
            !$this->emailExits($employee->getEmail())) 
            return $this->repository->add($employee);
        return false;
    }

    public function delete ($email) {
        return $this->repository->delete($email);
    }

    public function findAll () {
        return $this->repository->findAll();
    }

    public function findByID ($id) {
        return $this->repository->findByID($id);
    }

    public function search ($searchPattern) {
        return $this->repository->search($searchPattern);
    }

    public function emailExits($email) {
        return $this->repository->emailExits($email);
    }

}

?>