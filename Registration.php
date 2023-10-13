<?php
    $server ="localhost";
    $user= "root";
    $pass = "";

    $con = mysqli_connect($server, $user, $pass);

    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
  //  echo "Connected to db"

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    $username = $_POST['username'];

    $sql = "INSERT INTO `DepartmentManagement`.`Department` (`name`, `email`, `password`, `username`) VALUES ('$name', '$email', '$password', '$username');";
    echo $sql;

    if($con->query($sql)== true){
        echo "Seccessfully inserted";
    }else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
?>