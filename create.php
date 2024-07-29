<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare('INSERT INTO content (title, body, user_id) VALUES (?, ?, ?)');
    $stmt->execute([$title, $body, $user_id]);

    header('Location: read.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <form action="create.php" method="post">
        <h2>Create Content</h2>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>
        
        <label for="body">Body</label>
        <textarea id="body" name="body" required></textarea>
        
        <input type="submit" value="Create">
    </form>
    <?php include('includes/footer.php'); ?>
</body>
</html>
