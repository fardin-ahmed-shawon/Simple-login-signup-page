<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        h2 {
            background-color: white;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 1.5rem;   
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Signup</h1>
        <form action="#" method="POST">
            <input name="username" type="text" placeholder="Enter your username">
            <input name="email" type="email" placeholder="Enter your email">
            <input name="password" type="password" placeholder="Enter your password">
            <input name="cpass" type="password" placeholder="Confirm your password">
            <input name="submit" class="btn" type="submit" value="Signup">
            <div class="signupOption">Already have an account? <a href="login.php">Login</a></div>
        </form>
    </div>   

<?php
$con = mysqli_connect("localhost","root","","users");
error_reporting(0);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpass = $_POST['cpass'];

$query = "insert into info values ('$username','$email','$password')";

if ($_POST['submit']) {
    if ($username != "" && $email != "" && $password != "" && $cpass != "") {
        if ($password == $cpass) {
            mysqli_query($con, $query);
            echo "<h2>Registration Successful...</h2>";  
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/test/login%20form/welcome.php">
            <?php
        } else {
            echo "<h2>Re-enter your correct password</h2>";
        }
    } else {
        echo "<h2>All fields are required!</h2>";
    }
}
?>

</body>
</html>