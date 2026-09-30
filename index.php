<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>

    <a href="cad_usuario.php">Cadastrar</a><br>
    <a href="index.php">Lista</a> <br>
    <a href="pesquisar.php">Pesquisar Usuarios</a>
    <h1>Lista de Usuários Cadastrados</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $pagina_atual = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);
    $pagina_atual = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
    $sqn_result_pg = 2;
    $inicio = ($sqn_result_pg * $pagina_atual) - $sqn_result_pg;
    
    $result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $sqn_result_pg";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

    while ($row = mysqli_fetch_assoc($resultado_usuarios)) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Nome: " . $row['nome'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "<a href='editar.php?id=" . $row['id'] . "'>Editar</a><br>";
        echo "<a href='proc_apagar_usuario.php?id=" . $row['id'] . "'>Apagar</a><br>";
        echo "<hr>";
    }

    $result_pg = "SELECT COUNT(id) As num_result FROM usuarios";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    $quantidade_pg = $row_pg['num_result'];
    $paginas = ceil($quantidade_pg / $sqn_result_pg);

    $max_links = 2;

    echo "<a href='index.php?pagina=1'>Primeira</a> ";

    for ($pag_ant = $pagina_atual - $max_links; $pag_ant <= $pagina_atual - 1; $pag_ant++) {
        if ($pag_ant >= 1) {
            echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
        }
    }

    echo "<strong>$pagina_atual</strong> ";

    for ($pag_dep = $pagina_atual + 1; $pag_dep <= $pagina_atual + $max_links; $pag_dep++) {
        if ($pag_dep <= $paginas) {
            echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
        }
    }

    echo "<a href='index.php?pagina=$paginas'>Última</a>";
    ?>
    
</body>
</html>