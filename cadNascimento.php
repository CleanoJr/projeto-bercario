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
                        <li><a href="./medicos.php"><strong>Médicos</strong></a></li>
                        <li><a href="./maes.php"><strong>Mães</strong></a></li>
                    </ul>
                </nav>
            </aside>
        </div>
        <div id="right-hub">
            
            <div id="form-cadastro">

                <form action="cadNascimento.php" method="POST" >
                    <h1>Cadastro de Nascimento</h1>
                    <fieldset>
                        <label for="nome">Nome: </label>                            
                        <input type="text" id="nome" name="nome" placeholder="Digite o nome do bebê...">
                    </fieldset>
                    <fieldset>
                        <label for="altura">Altura (cm): </label>
                        <input type="number" id="altura" name="altura" placeholder="Digite a Altura bebê...">
                    </fieldset>
                    <fieldset>
                        <label for="peso">Peso (kg): </label>
                        <input type="number" id="peso" name="peso" min="0.01" step="0.010" placeholder="Digite a peso bebê...">
                    </fieldset>
                    <fieldset>
                        <label for="dataNascBebe">Data do Nascimento: </label>
                        <input type="date" id="dataNascBebe" name="dataNascBebe">
                    </fieldset>
                    <fieldset>
                        <label for="horaNascBebe">Hora do Nascimento: </label>
                        <input type="time" id="horaNascBebe" name="horaNascBebe">
                    </fieldset>

                    <div id="form-buttons">
                        <input class="form-button" type="submit" id="submit" name="submit">
                        <input class="form-button" type="reset" value="Limpar">
                        <button class="form-button" onclick="location.href='./nascimentos.php'">Voltar</button>
                    </div>
                </form>
            </div>

        </div>
    </main>
    
    <!-- Rodapé -->
    <footer>
        <p>Feito por <strong>Cleano Jr.</strong></p>
    </footer>

</body>
</html>