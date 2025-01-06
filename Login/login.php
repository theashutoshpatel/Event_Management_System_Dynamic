<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: rgb(63, 94, 251);
            background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(112, 102, 221, 1) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Roboto', sans-serif;
        }

        .global-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .register-form {
            width: 400px;
            padding: 30px;
            /* Increased padding for a spacious look */
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
            /* Slightly deeper shadow for a premium feel */
        }


        .register-form h3 {
            font-size: 28px;
            /* Increased font size for the heading */
        }

        .form-control {
            font-size: 16px;
            /* Larger input text for readability */
            padding: 12px;
            /* Increased padding in form fields */
        }

        .btn-primary {
            background: #2575fc;
            border: none;
        }

        .btn-primary:hover {
            background: #6a11cb;
        }

        .sign-in {
            text-align: center;
            margin-top: 15px;
        }

        .sign-in a {
            color: #2575fc;
            text-decoration: none;
        }

        .sign-in a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="global-container">
        <div class="card register-form">
            <div class="card-body">
                <h3 class="card-title">Register</h3>
                <div class="card-text">
                    <form method="post" action="register.php">
                        <?php include('errors.php'); ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control"
                                required placeholder="Enter Your Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required placeholder="Enter Your Email" pattern="[a-z0-9._%+\-]+@[gmail]+\.[.com]{2,}$">
                            <!-- <input type="email" id="email" name="email" pattern="[a-z0-9._%+\-]+@[gmail]+\.[.com]{2,}$"> -->
                        </div>
                        <div class="form-group">
                            <label for="password_1">Password</label>
                            <input type="password" name="password_1" class="form-control" required placeholder="Enter Your Password" pattern="[A-Za-z]{5}" maxlength="10" minlength="5">
                        </div>
                        <div class="form-group">
                            <label for="password_2">Confirm Password</label>
                            <input type="password" name="password_2" class="form-control" required placeholder="Enter Your Password" pattern="[A-Za-z]{5}" maxlength="10" minlength="5">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="reg_user">Register</button>
                        </div>
                        <div class="sign-in">
                            Already a member? <a href="/Event_Management_System/admin/login.php">Sign in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>