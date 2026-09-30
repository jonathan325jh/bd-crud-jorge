<?php
session_start();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>

    <a href="cad_usuario.php">Cadastrar</a><br>
    <a href="index.php">Lista</a>

    <h1>Cadastrar usuário</h1>

    <form method="POST" action="prod_cad_usuario.php">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite seu nome completo" required>
        <br>
        <br>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Digite seu email" required>
        <br>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
    
</body>
</html>