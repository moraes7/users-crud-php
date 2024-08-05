<?php 

if(isset($_POST['update'])) {

    include "../connect_mysql.php";

    $id = $_POST["id"];
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $profile = $_POST["profile"];

    $sqlUpdate = "UPDATE USERS SET name='$name', last_name='$last_name', email='$email', password='$password', profile='$profile' WHERE id='$id'";

    $conn->query($sqlUpdate);

    $conn->close();

    header("Location: index.php");

    die();
}

?>
