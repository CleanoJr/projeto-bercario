<?php

    include_once('conexao.php');

    if(isset($_POST['Atualizar']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $crm = $_POST['crm'];
        $especialidade = $_POST['especialidade'];
        
        $query = "UPDATE medico SET nomeMedico='$nome', especialidadeMedico='$especialidade', crmMedico='$crm' WHERE idMedico='$id'";
        $inserir = mysqli_query($connection, $query);
    } 
    

    header('Location: ../medicos.php');

?>