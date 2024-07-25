<?php 

if(!empty($_GET['id'])) {

    include "../connect_mysql.php";

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM USERS WHERE id=$id";

    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM USERS WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);

        $sqlResetID = "ALTER TABLE USERS AUTO_INCREMENT = 1";
        $resultReset = $conn->query($sqlResetID);
        
    }
    
    header("Location: index.php");

}

?>