<?php

    if(isset($_POST['submit'])) 
    {

        include_once('php/conexao.php');

        // Teste de recebimento de dados
        print_r($_POST['nome']);
        print_r($_POST['telefone']);
        print_r($_POST['endereco']);
        
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        
        $query = "INSERT INTO mae (nomeMae, telefoneMae, enderecoMae) VALUES ('$nome', '$telefone', '$endereco')";
        $inserir = mysqli_query($connection, $query);
        
        if($inserir){
            echo "<script language='javascript' type='text/javascript'>
            alert('Nascimento Cadastrado com Sucesso!');window.location.href='medicos.php';</script>";   
        } else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar esse usuário!');window.location.href='cadMedico.php';</script>";
        
        }     

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Cadastrar mãe | Berçario</title>
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
                <li><a href="./medicos.php">Médicos</a></li>
                <li><a href="./maes.php">Mães</a></li>
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

                <form action="cadMae.php" method="POST" >
                    <h1>Cadastro de Mãe</h1>
                    <fieldset>
                        <label for="nome">Nome: </label>                            
                        <input type="text" id="nome" name="nome" placeholder="Digite o nome...">
                    </fieldset>
                    <fieldset>
                        <label for="telefone">Telefone: </label>
                        <input type="text" id="telefone" name="telefone" placeholder="Digite o Telefone...">
                    </fieldset>
                    <fieldset>
                        <label for="endereco">Endereco: </label>
                        <input type="text" id="endereco" name="endereco" placeholder="Digite o endereço...">
                    </fieldset>

                    <div id="form-buttons">
                        <input type="submit" class="form-button" id="submit" name="submit">
                        <input type="reset" class="form-button" value="Limpar">
                        <button class="form-button" onclick="location.href='./maes.php'">Voltar</button>
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