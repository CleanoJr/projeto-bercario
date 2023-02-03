<?php

    if(!empty($_GET['id'])) 
    {

        include_once('php/conexao.php');

        // // Teste de recebimento de dados
        // print_r($_POST['nome']);
        // print_r($_POST['altura']);
        // print_r($_POST['peso']);
        
        $id = $_GET['id'];        
        
        $querySelect = "SELECT * FROM bebe WHERE idBebe = $id";
        // $result = mysqli_query($connection, $querySelect);
        $result = $connection->query($querySelect);
               
        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nomeBebe'];
                $altura = $user_data['alturaBebe'];
                $peso = $user_data['pesoBebe'];
                $data = $user_data['dataNascBebe'];
                $hora = $user_data['horaNascBebe'];

            }

        }else{
            // header('Location: nascimentos.php');
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
    <title>Berçario</title>
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
            
            <div class="form_cadastro">

                <h1>Cadastro </h1>
                <form action="php/salvarEditNascimento.php" method="POST" >  
                    <div class="textfield">
                        <label for="nome">Nome: </label>                            
                        <input type="text" id="nome" name="nome" value="<?php echo $nome ?>" placeholder="Digite o nome do bebê...">
                    </div>
                    <div class="textfield">
                        <label for="altura">Altura: </label>
                        <input type="number" id="altura" name="altura" step="0.01" value="<?php echo $altura ?>" placeholder="Digite a Altura bebê...">
                    </div>
                    <div class="textfield">
                        <label for="peso">Peso: </label>
                        <input type="number" id="peso" name="peso" min="1" step="0.001" value="<?php echo $peso ?>" placeholder="Digite a peso bebê...">
                    </div>
                    <div class="textfield">
                        <label for="dataNasc_bebe">Data do Nascimento: </label>
                        <input type="date" id="dataNasc_bebe" value="<?php echo $data ?>" name="dataNasc_bebe">
                    </div>
                    <div class="textfield">
                        <label for="horaNasc_bebe">Hora do Nascimento: </label>
                        <input type="time" id="horaNasc_bebe" value="<?php echo $hora ?>" name="horaNasc_bebe">
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" id="Atualizar" name="Atualizar">
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