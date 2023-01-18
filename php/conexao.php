<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "bercario";
$connection = new mysqli($server, $username, $password, $db);

$sql = mysqli_connect($server, $username, $password, $db);

// Teste Conexão
// if ($connection->connect_error){
//     echo "Falha na Conexao<br>";
//     die("Ocorreu um erro: ".$connection->connect_error);
    
// } else {
//     echo "Conectado!<br>";
// }

?>