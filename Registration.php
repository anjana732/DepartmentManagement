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

<!-- HTML form for login -->
<form method="post" action="">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
