<?php 

if(!empty($_GET['id'])) {

    include "../connect_mysql.php";

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM POSTS WHERE id=$id";

    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM POSTS WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);

        $sqlResetID = "ALTER TABLE USERS AUTO_INCREMENT = 1";
        $resultReset = $conn->query($sqlResetID);
        
    }
    
    header("Location: index-post.php");

}

?>