<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password_hash, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$username, $email, $password]);
        echo 'Usuário cadastrado com sucesso!';
    } catch (PDOException $e) {
        echo 'Erro ao cadastrar usuário: ' . $e->getMessage();
    }
}
?>
