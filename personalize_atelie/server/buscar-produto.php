<?php
require_once 'config.php';

$product_id = $_GET['id'] ?? null;

if (!$product_id) {
    die('Produto não encontrado.');
}

try {
    $stmt = $pdo->prepare('SELECT * FROM items WHERE item_id = ?');
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    if (!$product) {
        die('Produto não encontrado.');
    }
} catch (PDOException $e) {
    die('Erro ao carregar produto: ' . $e->getMessage());
}
?>
