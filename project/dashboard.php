<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is your dashboard.</p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
