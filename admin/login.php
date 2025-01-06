<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
ob_start();
if (!isset($_SESSION['system'])) {
    $system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
    foreach ($system as $k => $v) {
        $_SESSION['system'][$k] = $v;
    }
}
ob_end_flush();
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo $_SESSION['system']['name'] ?></title>
    <?php include('./header.php'); ?>
    <?php
    if (isset($_SESSION['login_id']))
        header("location:index.php?page=home");
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .global-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .login-form {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .login-form h3 {
            color: #333;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background: #2575fc;
            border: none;
        }

        .btn-primary:hover {
            background: #6a11cb;
        }

        .sign-up {
            text-align: center;
            margin-top: 15px;
        }

        .sign-up a {
            color: #2575fc;
            text-decoration: none;
        }

        .sign-up a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Welcome Admin</h3>
                <div class="card-text">
                    <form id="login-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <a href="#" style="float:right;font-size:12px;">Forgot password?</a>
                            <input type="password" id="password" name="password" class="form-control" required placeholder="Enter Your Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        <div class="sign-up">
                            Don't have an account? <a href="/Event_Management_System/Login/login.php">Create One</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#login-form').submit(function(e) {
            e.preventDefault();
            $('button[type="submit"]').attr('disabled', true).html('Logging in...');
            $.ajax({
                url: 'ajax.php?action=login',
                method: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
                    if (resp == 1) {
                        location.href = 'index.php?page=home';
                    } else if (resp == 2) {
                        location.href = 'voting.php';
                    } else {
                        $('#login-form').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>');
                        $('button[type="submit"]').removeAttr('disabled').html('Login');
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                    $('button[type="submit"]').removeAttr('disabled').html('Login');
                }
            });
        });
    </script>
</body>

</html>