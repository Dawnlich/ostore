<?php 
session_start(); 
include "database.php";
if (isset($_POST['uname']) && isset($_POST['password'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM accounts WHERE username='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $uname && $row['password'] === $pass) {
            $_SESSION['company_name'] = $row['company_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
            exit();
        }else{
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    }else{
        header("Location: index.php?error=Incorect User name or password");
        exit();
    }
}else{
    header("Location: index.php");
    exit();
}