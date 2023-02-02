<?php

    if(isset($_POST['submit'])) 
    {

        include_once('php/conexao.php');

        // Teste de recebimento de dados
        print_r($_POST['nome']);
        print_r($_POST['crm']);
        print_r($_POST['especialidade']);
        
        $nome = $_POST['nome'];
        $crm = $_POST['crm'];
        $especialidade = $_POST['especialidade'];
        
        $query = "INSERT INTO medico (nomeMedico, crmMedico, especialidadeMedico) VALUES ('$nome', '$crm', '$especialidade')";
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
    <title>Cadastrar médico | Berçario</title>
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
            
            <div class="form-cadastro">

                <h1>Cadastro </h1>
                <form action="cadMedico.php" method="POST" >
                    <div class="textfield">
                        <label for="nome">Nome: </label>                            
                        <input type="text" id="nome" name="nome" placeholder="Digite o nome...">
                    </div>
                    <div class="textfield">
                        <label for="crm">CRM: </label>
                        <input type="text" id="crm" name="crm" placeholder="Digite o CRM...">
                    </div>
                    <div class="textfield">
                        <label for="especialidade">Especialidade: </label>
                        <input type="text" id="especialidade" name="especialidade" placeholder="Digite a especialidade do médico...">
                    </div>

                    <input type="submit" id="submit" name="submit">
                    <input type="reset" value="Limpar">
                </form>

                <button><a href="./medicos.php">Voltar</a></button>

            </div>

        </div>
    </main>
    
    <!-- Rodapé -->
    <footer>
        <p>Feito por <strong>Cleano Jr.</strong></p>
    </footer>

</body>
</html>