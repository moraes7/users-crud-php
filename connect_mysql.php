<?php 

$db_server = "localhost";
$db_name = "sys-learn";
$db_user = "root";
$db_password = "";

$mysqli = new mysqli($db_server, $db_user, $db_password, $db_name);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}





?>