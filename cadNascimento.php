<?php

    if(isset($_POST['submit'])) 
    {

        include_once('php/conexao.php');

        // Teste de recebimento de dados
        print_r($_POST['nome']);
        print_r($_POST['altura']);
        print_r($_POST['peso']);
        
        $nome = $_POST['nome'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $data = $_POST['dataNascBebe'];
        $hora = $_POST['horaNascBebe'];
        
        $query = "INSERT INTO bebe (nomeBebe, pesoBebe, alturaBebe, dataNascBebe, horaNascBebe) VALUES ('$nome','$peso','$altura','$data','$hora')";
        // $query = "INSERT INTO bebe (nomeBebe, pesoBebe, alturaBebe) VALUES ('$nome','$peso','$altura')";
        $inserir = mysqli_query($connection, $query);
        
        if($inserir){
            echo "<script language='javascript' type='text/javascript'>
            alert('Nascimento Cadastrado com Sucesso!');window.location.href='nascimentos.php';</script>";   
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar esse usuário!');window.location.href='cadNascimento.php';</script>";
        
        }
        
        // echo "<script language='javascript' type='text/javascript'>
        // window.location.href='../home.html';</script>";        

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Home | Berçario</title>
</head>
<body>
    
    <!-- Cabeçalho -->
    <header>
        <div id="logo">
            <div id="logo-img">Logo</div>
        </div>
        <nav id="header-nav">
            <ul>
                <li><a href="./home.html">Home</a></li>
                <li><a href="./nascimentos.php">Nascimentos</a></li>
                <li><a href="#">Médicos</a></li>
                <li><a href="#">Mães</a></li>
            </ul>
        </nav>
    </header>

    <!-- Conteúdo Principal -->
    <main>
        <div id="left-hub">
            <!-- Inserir butões de opções -->
            <aside>
                <nav id="left-nav-menu">
                    <ul>
                        <li><a href="./nascimentos.php"><strong>Nascimentos</strong></a></li>
                        <li><a href="./nascimentos.php"><strong>Nascimentos</strong></a></li>
                    </ul>
                </nav>
            </aside>
        </div>
        <div id="right-hub">
            
            <div class="form-cadastro">

                <h1>Cadastro </h1>
                <form action="cadNascimento.php" method="POST" >
                    <div class="textfield">
                        <label for="nome">Nome: </label>                            
                        <input type="text" id="nome" name="nome" placeholder="Digite o nome do bebê...">
                    </div>
                    <div class="textfield">
                        <label for="altura">Altura: </label>
                        <input type="number" id="altura" name="altura" placeholder="Digite a Altura bebê...">
                    </div>
                    <div class="textfield">
                        <label for="peso">Peso: </label>
                        <input type="number" id="peso" name="peso" placeholder="Digite a peso bebê...">
                    </div>
                    <div class="textfield">
                        <label for="dataNascBebe">
                            Data do Nascimento:
                            <input type="date" id="dataNascBebe" name="dataNascBebe">
                        </label>
                    </div>
                    <div class="textfield">
                        <label for="horaNascBebe">
                            Hora do Nascimento:
                            <input type="time" id="horaNascBebe" name="horaNascBebe">
                        </label>
                    </div>
                    <input type="submit" id="submit" name="submit">
                    <input type="reset" value="Limpar">
                </form>
                <button><a href="./nascimentos.php">Voltar</a></button>
            </div>

        </div>
    </main>
    
    <!-- Rodapé -->
    <footer>
        <p>Feito por <strong>Cleano Jr.</strong></p>
    </footer>

</body>
</html>