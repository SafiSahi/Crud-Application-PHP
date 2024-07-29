<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <form action="register_process.php" method="post">
        <h2>Register</h2>

        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required>
        
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Register">
    </form>
    <?php include('includes/footer.php'); ?>
</body>
</html>
