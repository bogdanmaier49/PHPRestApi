<?php

include_once(__DIR__ . '/../Domain/Employee.php');

class EmployeeRepository {

    var $database_host = "localhost";
    var $database_name = "CompanyDB";
    var $database_user = "root";
    var $database_pass = "";
    var $connection;

    public function __construct () {
        $this->connection = mysqli_connect (
            $this->database_host, 
            $this->database_user, 
            $this->database_pass, 
            $this->database_name
        );

        if (!$this->connection) {
            exit ("Failed to connect.");
        }

        if (!mysqli_select_db($this->connection, $this->database_name)) {
            exit ("Failed to select database.");
        }
    }

    public function add ($employee) {

        if ($employee == null) {
            echo "Failed to add, Null employee";
            return; 
        }

        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $email = $employee->getEmail();
        $password = $employee->getPassword();
        $age = $employee->getAge();
        $role = $employee->getRole();
        $profile = $employee->getProfile();

        $query = 
        "INSERT INTO Employees(`FirstName`, `LastName`, `Email`, `Password`, `Age`, `Role`, `Profile`) VALUES 
        ('".$firstName."', '".$lastName."', '".$email."', '".$password."', ".$age.", '".$role."', ".$profile.");";
                    
        if (!mysqli_query($this->connection, $query))
            return false;

        return true;
    }

    public function delete ($email) {
        $query = "DELETE FROM Employees WHERE Email = '" . $email . "';";
                    
        if (!mysqli_query($this->connection, $query))
            return false;

        return true;
    }

    public function findAll () {
        $query = mysqli_query($this->connection, "SELECT * FROM Employees;") or exit(mysqli_error($this->connection));

        // Array of type Employee
        $result = array();

        if(mysqli_num_rows($query)) {
            while($row = mysqli_fetch_assoc($query)) {
                $result[] = (new Employee(
                    $row["FirstName"],
                    $row["LastName"],
                    $row["Email"],
                    $row["Password"],
                    $row["Age"],
                    $row["Role"],
                    $row["Profile"]
                ));
            }
        }

        return $result;
    }

    public function findByID ($id) {
        $query = mysqli_query($this->connection, "SELECT * FROM Employees WHERE ID = $id;") or exit(mysqli_error($this->connection));

        if(mysqli_num_rows($query)) {
            $row = mysqli_fetch_assoc($query);
            return new Employee(
                $row["FirstName"],
                $row["LastName"],
                $row["Email"],
                $row["Password"],
                $row["Age"],
                $row["Role"],
                $row["Profile"]
            );
        }

        return null;
    }

    public function search ($search) {
        $query = mysqli_query($this->connection, "SELECT * FROM Employees WHERE FirstName LIKE '%$search%' OR Role LIKE '%$search%';") or exit(mysqli_error($this->connection));

        // Array of type Employee
        $result = array();

        if(mysqli_num_rows($query)) {
            while($row = mysqli_fetch_assoc($query)) {
                $result[] = (new Employee(
                    $row["FirstName"],
                    $row["LastName"],
                    $row["Email"],
                    $row["Password"],
                    $row["Age"],
                    $row["Role"],
                    $row["Profile"]
                ));
            }
        }

        return $result;
    }

    public function emailExits($email) {
        $query = mysqli_query($this->connection, "SELECT * FROM Employees WHERE Email='$email';") or exit(mysqli_error($this->connection));

        if(mysqli_num_rows($query)) {
            return true;
        }

        return false;
    }

}

?>