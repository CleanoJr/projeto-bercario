<?php

    if(!empty($_GET['id'])) 
    {

        include_once('php/conexao.php');

        // // Teste de recebimento de dados
        // print_r($_POST['nome']);
        // print_r($_POST['crm']);
        // print_r($_POST['especialidade']);
        
        $id = $_GET['id'];        
        
        $querySelect = "SELECT * FROM medico WHERE idMedico = $id";
        // $result = mysqli_query($connection, $querySelect);
        $result = $connection->query($querySelect);
               
        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nomeMedico'];
                $crm = $user_data['crmMedico'];
                $especialidade = $user_data['especialidadeMedico'];

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
    <title>Editar médico | Berçario</title>
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

                <form action="php/salvarEditMedico.php" method="POST" >
                    <h1>Cadastro </h1>
                    <fieldset>
                        <label for="nome">Nome: </label>                            
                        <input type="text" id="nome" name="nome" value="<?php echo $nome ?>" placeholder="Digite o nome...">
                    </fieldset>
                    <fieldset>
                        <label for="crm">CRM: </label>
                        <input type="text" id="crm" name="crm" value="<?php echo $crm ?>" placeholder="Digite o CRM...">
                    </fieldset>
                    <fieldset>
                        <label for="especialidade">Especialidade: </label>
                        <input type="text" id="especialidade" name="especialidade" value="<?php echo $especialidade ?>" placeholder="Digite a especialidade do médico...">
                    </fieldset>

                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" id="Atualizar" name="Atualizar">
                    <input type="reset" value="Limpar">
                    <button onclick="location.href='./medicos.php'">Voltar</button>
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