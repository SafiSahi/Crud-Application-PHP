<?php
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare('INSERT INTO users (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$first_name, $last_name, $email, $username, $password]);

    header('Location: login.php');
    exit();
}
?>

