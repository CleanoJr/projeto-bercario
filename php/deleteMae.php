<?php

    include_once('conexao.php');

    $id = $_POST['delete_mae'];

$query = "DELETE FROM mae WHERE mae.idMae = $id";
$deletar = mysqli_query($connection, $query);

header('Location: ../maes.php');

?>