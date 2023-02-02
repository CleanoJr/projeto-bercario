<?php

    include_once('conexao.php');

    $id = $_POST['delete_medico'];

$query = "DELETE FROM medico WHERE medico.idMedico = $id";
$deletar = mysqli_query($connection, $query);

header('Location: ../medicos.php');

?>