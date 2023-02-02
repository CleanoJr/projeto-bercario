<?php

    include_once('conexao.php');

    if(isset($_POST['Atualizar']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        
        $query = "UPDATE mae SET nomeMae='$nome', telefoneMae='$telefone', enderecoMae='$endereco' WHERE idMae='$id'";
        $inserir = mysqli_query($connection, $query);
    } 
    

    header('Location: ../maes.php');

?>