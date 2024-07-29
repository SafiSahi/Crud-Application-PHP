<?php
session_start();
if (!isset($_SESSION['user_id'])) {
header('Location: login.php');
exit();
}

require 'config/database.php';

$uploadedImage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$file = $_FILES['file'];

if ($file['error'] === UPLOAD_ERR_OK) {
$filename = $file['name'];
$filepath = 'uploads/' . $filename;

if (move_uploaded_file($file['tmp_name'], $filepath)) {
$stmt = $pdo->prepare('INSERT INTO uploads (path, filename, user_id) VALUES (?, ?, ?)');
$stmt->execute([$filepath, $filename, $_SESSION['user_id']]);

$uploadedImage = $filepath; //file path for display
echo "File uploaded successfully!";
} else {
echo "File upload failed!";
}
} else {
echo "File upload failed!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include('includes/header.php'); ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
<h2>Upload Image</h2>
<label for="file">Choose file</label>
<input type="file" id="file" name="file" required>

<input type="submit" value="Upload">
</form>

<?php if ($uploadedImage): ?>
<h3>Uploaded Image:</h3>
<img src="<?php echo htmlspecialchars($uploadedImage); ?>" alt="Uploaded Image" style="max-width: 100%; height: auto;">
<?php endif; ?>

<?php include('includes/footer.php'); ?>
</body>
</html>