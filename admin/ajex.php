<?php
if ($_GET['action'] == 'login') {
    include('./db_connect.php');
    session_start();

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['login_id'] = $user['id'];
            echo 1; // Successful login
        } else {
            echo 0; // Invalid credentials
        }
    } else {
        echo 0; // Invalid credentials
    }
}
?>
