<?php 

if(isset($_POST['update'])) {

    include "../connect_mysql.php";

    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sqlUpdate = "UPDATE POSTS SET title='$title', content='$content' WHERE id='$id'";

    $conn->query($sqlUpdate);

    $conn->close();

    header("Location: index-post.php");

    die();
}

?>
