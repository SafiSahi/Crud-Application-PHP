<header>
    <h1>CRUD Application</h1>
    <nav>
        <a href="index.php">Home</a> |
        <a href="create.php">Create</a> |
        <a href="read.php">Read</a> |
        <a href="upload.php">Upload</a> |
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a> |
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>
</header>
