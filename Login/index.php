<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../admin/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: #f1f1f1;
            color: #333;
        }

        .header {
            background-color: #2575fc;
            padding: 20px;
            text-align: center;
            color: #fff;
            border-radius: 8px 8px 0 0;
            margin-bottom: 30px;
        }

        .header h2 {
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .content {
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .error, .success {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-size: 1rem;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .content a {
            color: #2575fc;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .content a:hover {
            color: #6a11cb;
        }

        .logout-btn, .login-btn {
            background-color: d0d8e4;
            color: #fff;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover, .login-btn:hover {
            background-color: whitesmoke;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
        }
    </style>
</head>
<body>

<!-- <div class="header">
    <h2>Welcome to Your Dashboard</h2>
</div> -->

<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <h3>
                Your account has been created successfully.
            </h3>
        </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php if (isset($_SESSION['username'])) : ?>
        <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></p>
        <div class="button-container">
            <!-- <a href="index.php?logout='1'" class="logout-btn">Logout</a> -->
            <a href="/Event_Management_System/admin/login.php" class="login-btn">Admin Login</a> <!-- Link for admin login -->
        </div>
    <?php endif ?>
</div>

</body>
</html>
