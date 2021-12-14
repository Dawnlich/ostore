<?php 
session_start();
include "database.php";
if (isset($_SESSION['id']) && isset($_SESSION['company_name'])) {
    ?>
<!DOCTYPE html> 
<html>
<head>
    <title>EDIT CUSTOMER PAGE</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
    </head>
        <body>
        <header id="edit">
            <h1 name="ostore">OSTORE</h1>
            <h1 name="edit">Editing a Client</h1>
        </header>
        <hr class="line">
        <form name = "homeForm" method="get" action="home.php">
            <input type="submit" value="Home" name="submit"></input>
        </form>
        <?php
            //showing the customer info to the user

            $search = $_GET['edit'];
            $table = $_SESSION['company_name'];
            $match = "SELECT * FROM $table WHERE customer LIKE '%$search%'";   
            $results = mysqli_query($conn, $match);
            $found = mysqli_num_rows($results);

            $name = "No Customer";
            $title = "No Customer";
            $num = "No Customer";
            $pay = "No Customer";
            $priority = "No Customer";
            $progress = "No Customer";
            $id = 0;
            $true = 0;
            
            if($found == 0){ 
                echo "<div class=\"noClient\">"."This Customer does not exist in the database! Go back, and try again."."</div>";
                $true = 1;
            }else if($search == ""){
                echo "<div class=\"noClient\">"."This Customer does not exist in the database! Go back, and try again."."</div>";
                $true = 1;
            }else{
                $sql = "SELECT * FROM $table WHERE customer LIKE '%$search%'";
                $runQuery = mysqli_query($conn, $sql);
                while($run = mysqli_fetch_array($runQuery)){
                    $name = $search;
                    $title = $run["job_title"];
                    $num = $run["phone_number"];
                    $pay = $run["payment"];
                    $priority = $run["priority"];
                    $progress = $run["progress"];
                    $id = $run["id"];
                }
            }

        ?>
        <form name = "form2" method="post">
            Customer Name: <input type="text" placeholder="<?php echo $name; ?>"  name="name" required>
            <br></br>
            Job title: <input type="text"  placeholder="<?php echo $title; ?>" name="title" required>
            <br></br>
            Customer Phone number: <input type="text"  placeholder="<?php echo $num; ?>" name="num" required>
            <br></br>
            Payment for Job: <input type="text" placeholder="<?php echo $pay; ?>" name="amount" required>
            <br></br>
            Priority <select name="priority">
                <option value=""><?php echo $priority; ?></option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <br></br>
            Progress <select name="progress">
                <option value=""><?php echo $progress; ?></option>
                <option value="Pending">Pending</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
            </select>
            <br></br>
            <button type="submit" name="update">Update Information</button>
        </form>
        <?php
           //update the information when the users hits the update button

           error_reporting(E_ERROR | E_PARSE);
            
            $nameUpdate = $_POST['name'];
            $titleUpdate = $_POST['title'];
            $numberUpdate = $_POST['num'];
            $amountUpdate = "$".$_POST['amount'];
            $priorityUpdate =$_POST['priority'];
            $progressUpdate = $_POST['progress'];

            if(isset($_POST["update"])) 
            {
                if($true == 0){
                    $sql = "UPDATE $table SET customer='$nameUpdate', job_title='$titleUpdate', phone_number='$numberUpdate',
                    payment='$amountUpdate', priority='$priorityUpdate', progress='$progressUpdate' WHERE id =$id";
                    if(mysqli_query($conn, $sql)){
                        echo "<div class=\"message\">Record successfully updated.</div>";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
                }else{
                    echo "<div class=\"message\">Can't update due do to no current client was search!</div>"; 
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