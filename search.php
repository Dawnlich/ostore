<?php 
session_start();
include "database.php";
if (isset($_SESSION['id']) && isset($_SESSION['company_name'])) {
    ?>
<!DOCTYPE html> 
<html>
<head>
    <title> SEARCH PAGE </title>
    <link rel="stylesheet" type="text/css" href="search.css">
    </head>
        <body>
        <header id="search">
            <h1 name="ostore">OSTORE</h1>
            <h1 name="find">Searching for a Client</h1>
        </header>
        <hr class="line">
        <form name = "homeForm" method="get" action="home.php">
            <input type="submit" value="Home" name="home"></input>
        </form>
        <br></br>
        <form name = "searchForm" method="get" action="search.php">
            <input type="text" placeholder="Please enter client's name..." name="search">
            <br></br>
            <input type="submit" value="Search" name="submit"></input>
        </form>
        <br></br>
        <form name="list">
            <?php
                $search = $_GET['search'];
                $table = $_SESSION['company_name'];
                $match = "SELECT * FROM $table WHERE customer LIKE '%$search%'";   
                $results = mysqli_query($conn, $match);
                $found = mysqli_num_rows($results);
                
                if($found == 0){ 
                    echo"<h5 class='card-title'>"."Search Word: "."This name does not exist in the database!"."</h5>";
                }else{
                    $sql = "SELECT * FROM $table WHERE customer LIKE '%$search%'";
                    echo"<h5 class='card-title'>"."Search Word: ".$search."</h5>";
                    $runQuery = mysqli_query($conn, $sql);
                    echo"<h5 class='card-title'>"."---------------------------------------------------------------------------------"."</h5>";
                    while($run = mysqli_fetch_array($runQuery)){
                        echo"<h5 class='card-title'>"."ID: ".$run["id"]. "</h5>";
                        echo"<h5 class='card-title'>"."PRIORITY: ".$run["priority"]. "</h5>";
                        echo"<h5 class='card-title'>"."CUSTOMER NAME: ".$run["customer"]. "</h5>";
                        echo"<h5 class='card-title'>"."JOB: ".$run["job_title"]. "</h5>";
                        echo"<h5 class='card-title'>"."PAYMENT: ".$run["payment"]. "</h5>";
                        echo"<h5 class='card-title'>"."Progess: ".$run["progress"]. "</h5>";
                        echo"<h5 class='card-title'>"."PHONE NUMBER: ".$run["phone_number"]. "</h5>";
                        echo"<h5 class='card-title'>"."---------------------------------------------------------------------------------"."</h5>";
                    }
                }
            ?>
        </form>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
?>