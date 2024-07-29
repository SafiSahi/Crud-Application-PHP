<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require 'config/database.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM content WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $content = $stmt->fetch();

    if (!$content) {
        echo "Content not found!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare('UPDATE content SET title = ?, body = ? WHERE id = ?');
    $stmt->execute([$title, $body, $id]);

    header('Location: read.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <form action="update.php" method="post">
        <h2>Update Content</h2>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($content['id']); ?>">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($content['title']); ?>" required>
        
        <label for="body">Body</label>
        <textarea id="body" name="body" required><?php echo htmlspecialchars($content['body']); ?></textarea>
        
        <input type="submit" value="Update">
    </form>
    <?php include('includes/footer.php'); ?>
</body>
</html>
