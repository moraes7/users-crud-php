<?php 

if(isset($_POST['update'])) {

    include "../connect_mysql.php";

    $id = $_POST["id"];
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $profile = $_POST["profile"];
    $previous_img = $_POST["previous_image"];

    if(isset($_FILES["image"]) && !empty($_FILES["image"])) {
        $image = "../photos/".$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    } else {
        $image = $previous_img;
    }

    unlink("../photo/$previous_img");


    $sqlUpdate = "UPDATE USERS SET name='$name', last_name='$last_name', email='$email', password='$password', profile='$profile', image='$image' WHERE id='$id'";

    $conn->query($sqlUpdate);

    $conn->close();

    header("Location: index.php");

    die();
}

?>
