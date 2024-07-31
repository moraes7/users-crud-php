<?php

include "../connect_mysql.php";

if($_SERVER["REQUEST_METHOD"] == "POST") { 
    $title = $_POST["title"];
    $content = $_POST["content"];
    $created_by = $_POST["created_by"];

    $sql = "INSERT INTO POSTS (title, content, created_by, created_at, updated_at) VALUES ('$title', '$content', '$created_by', current_timestamp(), current_timestamp())";

    $conn->query($sql);

    $conn->close();

    header("Location: index-post.php");
    
    die();
}

?>