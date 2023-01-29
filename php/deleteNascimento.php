<?php

    include_once('conexao.php');

    $id = $_POST['delete_nascimento'];

$query = "DELETE FROM bebe WHERE bebe.idBebe = $id";
$deletar = mysqli_query($connection, $query);

header('Location: ../nascimentos.php');

?>