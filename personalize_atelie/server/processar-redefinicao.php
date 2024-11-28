<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(16));
    $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

    try {
        $stmt = $pdo->prepare('INSERT INTO password_resets (user_id, reset_token, expiration_time) 
                               SELECT user_id, ?, ? FROM users WHERE email = ?');
        $stmt->execute([$token, $expiration, $email]);

        echo "Um link de recuperação foi enviado para o seu email.";
        // Aqui você enviaria o link real por email
    } catch (PDOException $e) {
        echo 'Erro ao gerar token de recuperação: ' . $e->getMessage();
    }
}
?>
