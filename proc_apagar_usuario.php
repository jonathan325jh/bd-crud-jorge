<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $result_usuarios = "DELETE FROM usuarios WHERE id='$id'";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao apagar usuário</p>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar usuário</p>";
    header("Location: index.php");
}
?>