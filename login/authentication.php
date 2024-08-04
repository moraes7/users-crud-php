<?php 
session_start();
include "../connect_mysql.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    //$password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user;
        header("Location: ../index.html");
        die();
    } else {
        $_SESSION['error'] = "Credenciais inválidas";
        header("Location: login.php");
        die();
    }
}

?>