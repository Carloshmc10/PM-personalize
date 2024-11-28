<?php
require_once 'config.php';

echo "<h1>Teste de Conexão ao Banco de Dados</h1>";

try {
    $stmt = $pdo->query("SELECT DATABASE()");
    $dbName = $stmt->fetchColumn();
    echo "<p style='color: green;'>Conexão bem-sucedida ao banco de dados: $dbName</p>";
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erro ao conectar ao banco de dados: " . $e->getMessage() . "</p>";
}
?>
