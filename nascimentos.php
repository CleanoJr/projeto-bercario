<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/tabela.css">
    <link rel="stylesheet" href="./css/style.css">

    <?php  include 'php/conexao.php'; ?>

    <title>Nascimentos | Berçario</title>
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
                        <li><a href="./cadNascimento.php"><strong>Novo Nascimento</strong></a></li>
                        <!-- <li><a href="./nascimentos.php"><strong>Nascimentos</strong></a></li> -->
                    </ul>
                </nav>
            </aside>
        </div>
        <div id="right-hub">
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Peso</th>
                        <th>Altura</th>
                        <th>Data do Nascimento</th>
                        <th>Horas do Nascimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM bebe";
                        $query_run = mysqli_query($connection, $query);
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $cliente)
                            { 
                    ?>
                                <tr>
                                    <td><?= $cliente['idBebe']; ?></td>
                                    <td><?= $cliente['nomeBebe']; ?></td>
                                    <td><?= $cliente['pesoBebe']; ?></td>
                                    <td><?= $cliente['alturaBebe']; ?></td>
                                    <td><?= $cliente['dataNascBebe']; ?></td>
                                    <td><?= $cliente['horaNascBebe']; ?></td>
                                    
                                    <td class="table-action-buttons">
                                        <a href="editNascimento.php?id=<?= $cliente['idBebe']; ?>" >Editar</a>
                                        <form action="delete_nascimento.php" method="POST">
                                            <button type="submit" name="delete_nascimento" value="<?=$cliente['idBebe'];?>" alt="Deletar">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php        
                            }
                        }
                        else {
                            echo "<h5> Nenhum Nascimento Cadastrado </h5>";
                        }
                            ?>                                
                </tbody>
            </table>

        </div>
    </main>
    
    <!-- Rodapé -->
    <footer>
        <p>Feito por <strong>Cleano Jr.</strong></p>
    </footer>

</body>
</html>