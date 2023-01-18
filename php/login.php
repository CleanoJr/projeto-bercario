<?php

include 'conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if(isset($usuario)){

    // echo $usuario;
    // echo $senha;

    $verifica = mysqli_query($connection, "SELECT * FROM usuario WHERE userUsuario like '$usuario' AND senhaUsuario like '$senha'") or die("Erro ao selecionar");
    
        if(mysqli_num_rows($verifica) <= 0){
            echo "<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location.href='../index.html';</script>";
            die();
        }else{
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='../home.html';</script>";
            setcookie('user',$usuario);
        }
}

?>