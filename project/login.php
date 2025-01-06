<?php
session_start();
include_once('connection.php');  // Ensure correct connection to event_db

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = $_POST['password'];

    // Fetch user details from userlogin table
    $query = "SELECT * FROM userlogin WHERE username='$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../index.php");
            exit(); // exit wriietn
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Username not found!";
    }
}

// form part display
// if (isset($_SESSION['user_id'])) {
//     header("Location: ../index.php");
//     exit;
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background-color: whitesmoke; */
            background: rgb(34, 193, 195);
            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(49, 121, 200, 1) 100%);
        }

        .card {
            border-radius: 1rem;
        }

        .card-img-left {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 1rem 0 0 1rem;
        }

        .form-label {
            font-weight: 500;
        }

        .btn {
            background-color: #393f81;
            color: #fff;
        }

        .btn:hover {
            background-color: #2c3270;
        }

        .error {
            color: red;
            font-size: 0.9rem;
        }

        .success {
            color: green;
            font-size: 0.9rem;
        }

        .card-img-left {
            height: auto;
            /* Maintain aspect ratio */
            max-height: 400px;
            /* Set a maximum height for better control */
            width: 100%;
            /* Ensure it spans the full width of its container */
            object-fit: cover;
            /* Ensures proper scaling without distortion */
            border-radius: 1rem 0 0 1rem;
            /* Retain existing rounded corners */
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="./login_banner2.jpg"
                                    alt="login form" class="img-fluid card-img-left" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0">Login</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control form-control-lg" required placeholder="Enter Your Username">

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-lg" required placeholder="Enter Your Password">

                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-lg btn-block" type="submit" name="login">Login</button>
                                        </div>

                                        <p class="small text-muted">Don't have an account? <a href="register.php" class="link-primary">Register here</a></p>

                                        <?php if (!empty($error)) {
                                            echo "<p class='error'>$error</p>";
                                        } ?>
                                        <?php if (!empty($_GET['message'])) {
                                            echo "<p class='success'>" . $_GET['message'] . "</p>";
                                        } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>