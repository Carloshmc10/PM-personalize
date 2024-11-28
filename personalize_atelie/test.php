<?php
require_once 'config.php';

echo "<h1>Teste do Sistema</h1>";

// Teste de conexão ao banco de dados
echo "<h2>Teste de Conexão ao Banco de Dados</h2>";
try {
    $stmt = $pdo->query('SELECT 1');
    echo "<p style='color: green;'>Conexão ao banco de dados estabelecida com sucesso.</p>";
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erro ao conectar ao banco de dados: " . $e->getMessage() . "</p>";
    exit;
}

// Teste de inserção de dados fictícios
echo "<h2>Teste de Inserção de Dados</h2>";
try {
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password_hash, created_at) VALUES (?, ?, ?, NOW())');
    $stmt->execute(['testeuser', 'testeuser@example.com', password_hash('123456', PASSWORD_DEFAULT)]);
    echo "<p style='color: green;'>Usuário fictício inserido com sucesso.</p>";
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erro ao inserir usuário: " . $e->getMessage() . "</p>";
}

// Teste de consulta
echo "<h2>Teste de Consulta de Dados</h2>";
try {
    $stmt = $pdo->query('SELECT username, email FROM users LIMIT 1');
    $user = $stmt->fetch();
    if ($user) {
        echo "<p style='color: green;'>Usuário encontrado: " . htmlspecialchars($user['username']) . " - " . htmlspecialchars($user['email']) . "</p>";
    } else {
        echo "<p style='color: red;'>Nenhum usuário encontrado.</p>";
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erro ao consultar dados: " . $e->getMessage() . "</p>";
}

// Teste de recuperação de produtos
echo "<h2>Teste de Consulta de Produtos</h2>";
try {
    $stmt = $pdo->query('SELECT name, price FROM items LIMIT 1');
    $product = $stmt->fetch();
    if ($product) {
        echo "<p style='color: green;'>Produto encontrado: " . htmlspecialchars($product['name']) . " - R$" . htmlspecialchars($product['price']) . "</p>";
    } else {
        echo "<p style='color: red;'>Nenhum produto encontrado.</p>";
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erro ao consultar produtos: " . $e->getMessage() . "</p>";
}

echo "<h2>Teste Finalizado</h2>";
?>
