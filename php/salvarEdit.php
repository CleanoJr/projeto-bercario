<?php

    include_once('conexao.php');

    if(isset($_POST['Atualizar']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $data = $_POST['dataNasc_bebe'];
        $hora = $_POST['horaNasc_bebe'];
        
        $query = "UPDATE bebe SET nomeBebe='$nome', pesoBebe='$peso', alturaBebe='$altura', dataNascBebe='$data', horaNascBebe='$hora' WHERE idBebe='$id'";
        $inserir = mysqli_query($connection, $query);
    } 
    
    // print_r($query);

    header('Location: ../nascimentos.php');

?>