<?php

include "../connect_mysql.php";

if($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $profile = $_POST["profile"];

    $sql = "INSERT INTO USERS (name, last_name, email, password, profile, created_at, updated_at) VALUES ('$name', '$last_name', '$email', '$password', '$profile', current_timestamp(), current_timestamp())";

    $conn->query($sql);

    $conn->close();

    header("Location: index.php");
    
    die();
}

?>