<?php
require_once "script.php";

// --- Adicionar usuário ---
if (isset($_POST['nome']) && isset($_POST['email'])) {
    addUser($_POST['nome'], $_POST['email']);
    header("Location: index.php");
    exit;
}

// --- Deletar usuário ---
if (isset($_GET['delete'])) {
    deleteUser($_GET['delete']);
    header("Location: index.php");
    exit;
}

$usuarios = listUsers();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Adicionar</button>
    </form>

    <hr>

    <ul>
        <?php foreach ($usuarios as $user): ?>
            <li>
                <?= htmlspecialchars($user['nome']) ?>  
                (<?= htmlspecialchars($user['email']) ?>)
                <a href="?delete=<?= $user['id'] ?>">[Remover]</a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
