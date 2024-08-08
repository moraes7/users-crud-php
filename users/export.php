<?php 
include "../connect_mysql.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabelas Desafios</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 300px;
            height: 90px;
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>';

$html .= "<h1>Relatório de Usuários</h1>";

if($result->num_rows > 0) {
    $html .= "<table>";
    $html .= "<thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Perfil</th>
            </tr>
            </thead>";
    $html .= "<tbody>";
    while($row = $result->fetch_object()) {
        $html .= "<tr>";
        $html .= "<td>".$row->id."</td>";
        $html .= "<td>".$row->name."</td>";
        $html .= "<td>".$row->last_name."</td>";
        $html .= "<td>".$row->email."</td>";
        $html .= "<td>".$row->profile."</td>";
        $html .= "</tr>";
    }
    $html .= "</tbody>
            </table>";
} else {
    $html .= "<p>No data</p>";
}

$html .= "</body>
        </html>";

use Dompdf\Dompdf;
require "vendor/autoload.php";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->set_option('defaultFont', 'Arial');
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$dompdf->stream("usuarios.pdf");

?>
