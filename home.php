<?php 
session_start();
include "database.php";
if (isset($_SESSION['id']) && isset($_SESSION['company_name'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="home.css">
    </head>
    <body>
        <header id="background">
            <h1 name="ostore">OSTORE</h1>
            <h1 name="company">Welcome, <?php echo $_SESSION['company_name']; ?> inc.</h1>
        </header>
        <hr class="line">
        <form name="logout" action="logout.php">
            <input name="logout" type="submit" value="LOGOUT" >
        </form>
        <div name="twoForms">
            <form name="addForm" action="add.php">
                <h2>Add Client</h2>
                <br></br>
                <input type="submit" value="Add a New Customer" name="add"></input>
            </form>
            <form name="editForm" method="get" action="edit.php">
                <h2>Edit Client</h2>
                <input type="text" placeholder="Enter Client name..." name="edit" required>
                <br></br>
                <input type="submit" value="edit" name="submit"></input>
            </form>
            <form name="searchForm" method="get" action="search.php">
                <h2>Search for a Client</h2>
                <input type="text" placeholder="Enter Client name..." name="search">
                <br></br>
                <input type="submit" value="Search" name="submit"></input>
            </form>
        </div>
        <br></br>
        <form name="priority">
        <h2>Priority list</h2>
        <?php
                $priority = "yes";
                $table = $_SESSION['company_name'];
                $sql = "SELECT * FROM $table WHERE priority LIKE '%$priority%'";  
                echo"<h5 class='card-title'>"."---------------------------------------------------------------------------------"."</h5>";
                $runQuery = mysqli_query($conn, $sql);
                while($run = mysqli_fetch_array($runQuery)){
                    echo"<h5 class='card-title'>"."ID: ".$run["id"]. "</h5>";
                    echo"<h5 class='card-title'>"."PRIORITY: ".$run["priority"]. "</h5>";
                    echo"<h5 class='card-title'>"."CUSTOMER NAME: ".$run["customer"]. "</h5>";
                    echo"<h5 class='card-title'>"."JOB: ".$run["job_title"]. "</h5>";
                    echo"<h5 class='card-title'>"."PAYMENT: ".$run["payment"]. "</h5>";
                    echo"<h5 class='card-title'>"."Progess: ".$run["progress"]. "</h5>";
                    echo"<h5 class='card-title'>"."PHONE NUMBER:".$run["phone_number"]. "</h5>";
                    echo"<h5 class='card-title'>"."---------------------------------------------------------------------------------"."</h5>";
                }
        ?>
        </form>
        <br></br>
    </body>
    </html>
    <?php 
}else{
     header("Location: index.php");
     exit();
}
?>