<?php 

include_once("Controller/EmployeeController.php");

$employeeContrller = new EmployeeController();

if (isset($_GET["method"])) {

    if ($_GET["method"] == "findAllEmployees") {
        echo $employeeContrller->findAllEmployees();
    }

    if ($_GET["method"] == "search" && isset($_GET["searchPattern"])) {
        echo $employeeContrller->search($_GET["searchPattern"]);
    }

}

if (isset($_POST["method"])) {

    if ($_POST["method"] == "addEmployee") {
        $FirstName = "";
        $LastName = "";
        $Email = "";
        $Password = "";
        $Age = 0;
        $Role = "";
        $Profile = 0;

        if (isset($_POST["FirstName"])) $FirstName = $_POST["FirstName"];
        if (isset($_POST["LastName"])) $LastName = $_POST["LastName"];
        if (isset($_POST["Email"])) $Email = $_POST["Email"];
        if (isset($_POST["Password"])) $Password = $_POST["Password"];
        if (isset($_POST["Age"])) $Age = $_POST["Age"];
        if (isset($_POST["Role"])) $Role = $_POST["Role"];
        if (isset($_POST["Profile"])) $Profile = $_POST["Profile"];

        echo $employeeContrller->addEmployee(new Employee($FirstName, $LastName, $Email, $Password, $Age, $Role, $Profile));
    }

    if ($_POST["method"] == "removeEmployee") {
        if (isset($_POST["Email"]))
            echo $employeeContrller->removeEmployee($_POST["Email"]);
    }

    if ($_POST["method"] == "updateRole") {
        if (isset($_POST["Email"]) && isset($_POST["Role"]))
            echo $employeeContrller->updateRole($_POST["Email"], $_POST["Role"]);
    }

}

?>