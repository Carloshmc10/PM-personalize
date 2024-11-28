<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $token = bin2hex(random_bytes(16));
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $stmt = $pdo->prepare("UPDATE users SET reset_token = ?, expiration_time = ? WHERE email = ?");
        $stmt->execute([$token, $expiration, $email]);

        echo "Link de recuperação enviado. <a href='login.html'>Voltar ao login</a>";
    } else {
        echo "E-mail não encontrado.";
    }
}
?>
