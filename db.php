<?php
$host = "localhost";
$db = "blog";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opitions = [
    PDO :: ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION,
    PDO :: ATTR_DEFAULT_FETCH_MODE => PDO :: FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $opitions);
} catch (PDOException $e) {
    die ("Erro na conexão" . $e->getMessage());
}
?>