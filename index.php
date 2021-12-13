<!DOCTYPE html> 
<html>
<head>
    <title> LOGIN PAGE </title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <form action ="login.php" method="post">
        <h2>Welcome to OSTORE!</h2>
        <label> User's Name </label>
        <input type ="text" name="uname"  placeholder="Please enter username" required><br>
        <label> Password </label>
        <input type ="password" name="password"  placeholder="Please enter passowrd" required><br>
        <button type="submit">Sign in</button>
    </form>
</body>
</html>
