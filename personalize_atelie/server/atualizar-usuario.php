<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    try {
        $stmt = $pdo->prepare('UPDATE users SET username = ?, email = ?, updated_at = NOW() WHERE user_id = ?');
        $stmt->execute([$username, $email, $user_id]);
        echo 'Informações atualizadas com sucesso!';
    } catch (PDOException $e) {
        echo 'Erro ao atualizar informações: ' . $e->getMessage();
    }
} else {
    $stmt = $pdo->prepare('SELECT username, email FROM users WHERE user_id = ?');
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
}
?>
