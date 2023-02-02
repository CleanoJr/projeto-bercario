<?php

include_once('./php/conexao.php');
if (!empty($_GET['search']))
{
    $data = $_GET['search'];
    $query = "SELECT * FROM mae WHERE nomeMae LIKE '%$data%' or telefoneMae LIKE '%$data%' or enderecoMae LIKE '%$data%' ORDER BY nomeMae";

}
else{
    $query = "SELECT * FROM mae ORDER BY nomeMae";
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
                    <div id="pesquisa">
                    <input type="search" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                        <button onclick="searchData()"><img src="./assets/pesquisar.svg" alt="Realizar pesquisa"></button>
                    </div>
                    
                    <div id="novo-registro">
                        <a href="./cadMae.php"><img src="./assets/add.svg" alt="Novo Registro"><strong>Novo Registro</strong></a>
                    </div>
                </div>

                <?php 
                           
                           if(mysqli_num_rows($query_run) > 0)
                           {
                       ?>
                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                                foreach($query_run as $mae)
                                { 
                        ?>
                                    <tr>                                        
                                        <td><?= $mae['nomeMae']; ?></td>
                                        <td><?= $mae['telefoneMae']; ?></td>
                                        <td><?= $mae['enderecoMae']; ?></td>
                                        
                                        <td class="table-action-buttons">
                                            <a href="editMae.php?id=<?= $mae['idMae']; ?>" ><img src="./assets/edit.svg" alt="Editar Registro"></a>
                                            <form action="php/deleteMae.php" method="POST">
                                                <button type="submit" name="delete_mae" value="<?=$mae['idMae'];?>" alt="Deletar"><img src="./assets/delete.svg" alt="Deletar Registro"></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php        
                                }
                            }
                            else {
                                echo "<h4> NENHUM REGISTRO ENCONTRADO </h4>";
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
        window.location = 'maes.php?search='+search.value;
    }

</script>
</html>