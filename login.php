<?php
session_start();
require "../config/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    if($usuario && password_verify($senha, $usuario['senha'])){
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header("Location: ../posts/index.php");
        exit();
} else {
    echo "Email ou senha incorretos";
}
}
?>

<form method="POST">
    <h2>Login</h2>
    <input type="email" name="email" required placeholder="Email"><br>
    <input type="password" name="senha" required placeholder="Senha"><br>
    <button type="submit">Entrar</button>
</form>