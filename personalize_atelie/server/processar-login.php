<?php
require_once 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare('SELECT user_id, password_hash FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header('Location: user_page.php');
            exit;
        } else {
            echo 'Email ou senha incorretos!';
        }
    } catch (PDOException $e) {
        echo 'Erro ao efetuar login: ' . $e->getMessage();
    }
}
?>
