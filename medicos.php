<?php

include_once('./php/conexao.php');
if (!empty($_GET['search']))
{
    $data = $_GET['search'];
    $query = "SELECT * FROM medico WHERE nomeMedico LIKE '%$data%' or crmMedico LIKE '%$data%' or especialidadeMedico LIKE '%$data%' ORDER BY nomeMedico";

}
else{
    $query = "SELECT * FROM medico ORDER BY nomeMedico";
}

$query_run = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/tabela.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Médicos | Berçario</title>

    <?php  include 'php/conexao.php'; ?>

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
            <!-- Inserir botões de opções -->
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
            <div id="right-hub-tabela">

                <div id="pesquisa-tabela">
                    <input type="search" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                    <button onclick="searchData()"><img src="./assets/pesquisar.svg" alt="Realizar pesquisa"></button>
                </div>

                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Nome</th>
                            <th>CRM</th>
                            <th>Especialidade</th>                           
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                           
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $medico)
                                { 
                        ?>
                                    <tr>                                        
                                        <td><?= $medico['nomeMedico']; ?></td>
                                        <td><?= $medico['crmMedico']; ?></td>
                                        <td><?= $medico['especialidadeMedico']; ?></td>
                                        
                                        <td class="table-action-buttons">
                                            <a href="editMedico.php?id=<?= $medico['idMedico']; ?>" ><img src="./assets/edit.svg" alt="Editar Registro"></a>
                                            <form action="php/deleteMedico.php" method="POST">
                                                <button type="submit" name="delete_medico" value="<?=$medico['idMedico'];?>" alt="Deletar"><img src="./assets/delete.svg" alt="Deletar Registro"></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php        
                                }
                            }
                            else {
                                echo "<h5> Nenhum Médico Cadastrado </h5>";
                            }
                                ?>                                
                    </tbody>
                </table>
            </div>
 
        </div>
    </main>
    
    <!-- Rodapé -->
    <footer>
        <p>Feito por <strong>Cleano Jr.</strong></p>
    </footer>

</body>

<script>
    var search = document.getElementById('pesquisar');
    
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter")
        {
            searchData();
        }
    });

    function searchData() {
        window.location = 'nascimentos.php?search='+search.value;
    }

</script>
</html>