<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
        <h1>Login</h1>
        <form action="#" method="POST">
            <input name="email" type="email" placeholder="Enter your email">
            <input name="password" type="password" placeholder="Enter your password">
            <a href="recovery.php">Forget Password?</a><br><br>
            <input name="submit" class="btn" type="submit" value="Login">
            <div class="signupOption">Don't have an account? <a href="signup.php">Signup</a></div>
        </form>
    </div>   

<?php
$con = mysqli_connect("localhost","root","","users");
error_reporting(0);

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM info";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);

$count = 0;
if ($_POST['submit']) {
    if ($email != "" && $password != "") {
        if ($total != 0) {
            while($result = mysqli_fetch_array($data)) {
                if ($result['email'] == $email && $result['password'] == $password) {
                    echo "<h2>login Successful...</h2>";
                    $count++;
                    break;
                } 
            }
            if ($count == 0) {
                echo "<h2>Incorrect Information!</h2>";
            } else {
                ?>
                <META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/test/login%20form/welcome.php">
                <?php
            }
        }
    } else {
        echo "<h2>All fields are required!</h2>";
    }
}

?>
    
</body>
</html>