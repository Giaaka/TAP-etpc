<?php
//Conectar no banco de dados
require "../config/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $smtp = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?,?,?)");
    // INSERT é para inserir usuario
    $smtp->execute([$nome, $email, $senha]);
    header("Location: login.php");
    exit();
}
?>
<form method="POST"> 
    <h2>Cadastrar</h2>
    <input type="text" name ="nome" required placeholder="Nome"> <br>
    <input type ="email" name ="email" required placeholder="Email"><br>
    <input type ="password" name ="senha" required placeholder="senha"><br>
    <button type ="submit"> Cadastrar</button>
</form>