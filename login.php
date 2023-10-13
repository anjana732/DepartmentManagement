<?php

$server = "localhost";
$user = "root";
$pass = "";

$con = mysqli_connect($server, $user, $pass);

if (!$con) {
    die("Connection to database failed due to" . mysqli_connect_error());
}

// Only run when form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM `DepartmentManagement`.`Department` WHERE email = '$email' AND password = '$password'";

    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "Logged in successfully!";
        // You can start a session here and set required session variables if needed.
    } else {
        echo "Invalid email or password!";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="lgnStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <div class="container">
      
        <div class="left">
            <img class="loginimg" src="Assets/login.jpg" alt="loginimage">
        </div>
        
            <div class="right">
                <form action="login.php" method="post">
                     <h3>Member Login</h3>
                     <input type="email" name="email" id="email" placeholder="Username or password ">
                    <input type="password" name="password" id="password" placeholder="password">
                     <button class="btn" type="submit" name="submit" value="submit">Login</button>
                 </form>
            </div>
        
    </div>
</body>
</html>