<?php
    $server ="localhost";
    $user = "root";
    $pass = "";

    $con = mysqli_connect($server, $user, $pass);
    if(!$con){
        die("Connection to database failed due to".mysqli_connect_error());
    }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql ="INSERT INTO `DepartmentManagement`.`Department` (`name`, `email`, `username`, `password`) VALUES ('$name', '$email', '$username', '$password');";
        echo $sql;

        if($con->query($sql)==ture){
            echo "Successfully inserted";
        }else{
            echo "Error: $sql <br> $con->error";
        }
        $con->close();
    
?>