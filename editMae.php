<?php

    if(!empty($_GET['id'])) 
    {

        include_once('php/conexao.php');

        // // Teste de recebimento de dados
        // print_r($_POST['nome']);
        // print_r($_POST['telefone']);
        // print_r($_POST['endereco']);
        
        $id = $_GET['id'];        
        
        $querySelect = "SELECT * FROM mae WHERE idMae = $id";
        // $result = mysqli_query($connection, $querySelect);
        $result = $connection->query($querySelect);
               
        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nomeMae'];
                $telefone = $user_data['telefoneMae'];
                $endereco = $user_data['enderecoMae'];

            }

        }else{
            // header('Location: medicos.php');
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

                <form action="php/salvarEditMae.php" method="POST" >
                    <h1>Edição de Registro </h1>
                    <fieldset>
                        <label for="nome">Nome: </label>                            
                        <input type="text" id="nome" name="nome" value="<?php echo $nome ?>"  placeholder="Digite o nome...">
                    </fieldset>
                    <fieldset>
                        <label for="telefone">Telefone: </label>
                        <input type="text" id="telefone" name="telefone" value="<?php echo $telefone ?>" placeholder="Digite o Telefone...">
                    </fieldset>
                    <fieldset>
                        <label for="endereco">Endereco: </label>
                        <input type="text" id="endereco" name="endereco" value="<?php echo $endereco ?>" placeholder="Digite o endereço...">
                    </fieldset>

                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <div id="form-buttons">
                        <input class="form-button" type="submit" class="" id="Atualizar" name="Atualizar">
                        <input class="form-button" type="reset" value="Limpar">
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