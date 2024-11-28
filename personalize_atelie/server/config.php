<?php
$host = '127.0.0.1'; // Ou 'localhost'
$dbname = 'personalize_atelie'; // Substitua pelo nome correto do seu banco
$username = 'root'; // Usuário padrão do XAMPP
$password = '091535'; // Senha padrão no XAMPP é vazia

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
