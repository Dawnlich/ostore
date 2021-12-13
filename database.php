<?php

$sname= "localhost";

$unmae= "root";

$password = "";

$database = "crm";

$conn = mysqli_connect($sname, $unmae, $password, $database);

if (!$conn) {

    echo "Connection failed!";

}
?>