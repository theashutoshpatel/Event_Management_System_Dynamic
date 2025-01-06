<?php
include_once('connection.php');  // Make sure the connection.php is correct and points to event_db

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Hashing password

    // Check if username or email already exists in the userlogin table
    $check_query = "SELECT * FROM userlogin WHERE username='$username' OR email='$email'";
    $result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username or Email already exists!";
    } else {
        // Insert user data into userlogin table
        $insert_query = "INSERT INTO userlogin (name, username, email, password) 
                         VALUES ('$name', '$username', '$email', '$password')";
        if (mysqli_query($connection, $insert_query)) {
            header("Location: login.php?message=Registration Successful! Please Login.");
        } else {
            $error = "Error: " . mysqli_error($connection);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background-color: whitesmoke; */
            background: rgb(34, 193, 195);
            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(61, 75, 223, 1) 100%);
        }

        .card-img-left {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 1rem 0 0 1rem;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="./registerlogin.webp"
                                    alt="Register form" class="img-fluid card-img-left" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Register</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create your account</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control form-control-lg" required placeholder="Enter Your Name" />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control form-control-lg" required placeholder="Enter Your Username" />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" required placeholder="Enter Your Email" />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" required placeholder="Enter Your Password" />

                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="register">Register</button>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="login.php" style="color: #393f81;">Login here</a></p>
                                        <?php if (!empty($error)) {
                                            echo "<p class='error'>$error</p>";
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