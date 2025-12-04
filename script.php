<?php
require_once "connection.php";

use App\Database\Connection;

$db = Connection::get();

// --- ADICIONAR USUÁRIO ---
function addUser($nome, $email) {
    global $db;

    $stmt = $db->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
    return $stmt->execute([$nome, $email]);
}

// --- LISTAR USUÁRIOS ---
function listUsers() {
    global $db;

    $stmt = $db->query("SELECT * FROM usuarios ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// --- REMOVER USUÁRIO ---
function deleteUser($id) {
    global $db;

    $stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
    return $stmt->execute([$id]);
}
