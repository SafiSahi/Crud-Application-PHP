<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require 'config/database.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('DELETE FROM content WHERE id = ?');
    $stmt->execute([$_GET['id']]);

    header('Location: read.php');
    exit();
}
?>
