<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuarios = "SELECT * FROM usuarios WHERE id =  '$id'";
$result_usuarios = mysqli_query($conn, $result_usuarios);
$row_usuario = mysqli_fetch_assoc($result_usuarios);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>

    <h1>Editar usuário</h1>

    <form method="POST" action="proc_edit_usuario.php">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>" required>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite seu nome completo" value="<?php echo $row_usuario['nome']; ?>" required>
        <br>
        <br>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Digite seu email" value="<?php echo $row_usuario['email']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Editar">
    </form>
    
</body>
</html>