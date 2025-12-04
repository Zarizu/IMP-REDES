<?php
require_once "connection.php";

use App\Database\Connection;

$db = Connection::get();

$sql = "
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE
);
";

$db->exec($sql);

echo "Tabela criada com sucesso!";
