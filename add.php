<?php 
session_start();
include "database.php";
if (isset($_SESSION['id']) && isset($_SESSION['company_name'])) {
    ?>
<!DOCTYPE html> 
<html>
<head>
    <title>ADD NEW CUSTOMER PAGE</title>
    <link rel="stylesheet" type="text/css" href="add.css">
    </head>
        <body>
        <header id="add">
            <h1 name="ostore">OSTORE</h1>
            <h1 name="add">Adding a  new Client</h1>
        </header>
        <hr class="line">
        <form name = "homeForm" method="get" action="home.php">
            <input type="submit" value="Home" name="submit"></input>
        </form>
        <form name="form2" method="post">
            Customer Name: <input type="text" placeholder="Customer Name...." name="name" required>
            <br></br>
            Job title: <input type="text" placeholder="Job title...." name="title" required>
            <br></br>
            Customer Phone number: <input type="text" placeholder="Phone number...." name="num" required>
            <br></br>
            Payment for Job: <input type="text" placeholder="Amount...." name="amount" required>
            <br></br>
            Priority <select name="priority">
                <option value="">Select...</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <br></br>
            Progress <select name="progress">
               <option value="">Select...</option>
                <option value="Pending">Pending</option>
                <option value="Ongoing">Ongoing</option>
               <option value="Completed">Completed</option>
            </select>
            <br></br>
            <button type="submit" name="add">Save Information</button>
        </form>
        <?php
            error_reporting(E_ERROR | E_PARSE);

            //table that that is connected to the customer
            $table = $_SESSION['company_name'];

            //variables from the user
            $name = $_POST['name'];
            $title = $_POST['title'];
            $num= $_POST['num'];
            $amount = "$".$_POST['amount'];
            $priority =$_POST['priority'];
            $progress = $_POST['progress'];

            if(isset($_POST["add"]))
            {
                $sql = "INSERT INTO $table (priority, job_title, customer, payment, progress, phone_number) 
                VALUES ('$priority', '$title', '$name', '$amount', '$progress', '$num')";
                if(mysqli_query($conn, $sql)){
                    echo "<div class=\"add\">Records inserted successfully.</div>";
                } else{
                    echo "<div class=\"error\">ERROR: Could not able to execute $sql. </div>" . mysqli_error($conn);
                }
            }

        ?>
        </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
?>