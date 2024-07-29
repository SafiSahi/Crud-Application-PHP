<?php
session_start();
require 'config/database.php';

$stmt = $pdo->query('SELECT content.id, content.title, content.body, users.username FROM content JOIN users ON content.user_id = users.id');
$contents = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <h2>Content List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Author</th>
        </tr>
        <?php foreach ($contents as $content): ?>
            <tr>
                <td><?php echo htmlspecialchars($content['id']); ?></td>
                <td><?php echo htmlspecialchars($content['title']); ?></td>
                <td><?php echo htmlspecialchars($content['body']); ?></td>
                <td><?php echo htmlspecialchars($content['username']); ?></td>
                <td><a href="delete.php?id=<?php echo $content['id'];  ?>">delete</a></td>
                <td><a href="update.php?id=<?php echo $content['id'];  ?>">update</a></td>
            </tr>
            
        <?php endforeach; ?>
    </table>
    <?php include('includes/footer.php'); ?>
</body>
</html>
