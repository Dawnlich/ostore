<!DOCTYPE html> 
<html>
<head>
    <title> Login Page </title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <form action ="login.php" method="post">
        <h2>Welcome to OSTORE!</h2>
        <h3>User's Name:</h3>
        <input type ="text" name="uname"  placeholder="Please enter username..." required><br>
        <h3>Password:</h3>
        <input type ="password" name="password"  placeholder="Please enter passowrd..." required><br>
        <button type="submit">Sign in</button>
    </form>
</body>
</html>
