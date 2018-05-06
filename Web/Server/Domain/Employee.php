<?php

class Employee implements JsonSerializable {

    private $FirstName;
    private $LastName;
    private $Age;
    private $Email;
    private $Role;
    private $Profile;
    private $Password;

    public function __construct(
        $FirstName, $LastName, $Email, $Password, $Age, $Role, $Profile
    ) {
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Email = $Email;
        $this->Role = $Role;
        $this->Profile = $Profile;
        $this->Password = $Password;
        $this->Age = $Age;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }

    public function getFirstName () {
        return $this->FirstName;
    }

    public function getLastName () {
        return $this->LastName;
    }

    public function getEmail () {
        return $this->Email;
    }

    public function getRole () {
        return $this->Role;
    }

    public function getProfile () {
        return $this->Profile;
    }

    public function getPassword () {
        return $this->Password;
    }

    public function getAge () {
        return $this->Age;
    }
}

?>