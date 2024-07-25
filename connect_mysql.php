<?php 

/*$db_server = "localhost";
$db_name = "sys-learn";
$db_user = "root";
$db_password = "";

$conn = new mysqli($db_server, $db_user, $db_password, $db_name);

if($conn->error) {
    die("Falha ao conectar ao banco de dados: " . $conn->error);
}*/

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'sys-learn');

$conn = new mysqli(HOST, USER, PASS, DB);





?>