<?php

include 'include/db.php';

$message = "";

if (isset($_POST['register'])) {

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {

        $message = "Passwords do not match!";

    } else {

        // Check if email already exists
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {

            $message = "This email is already registered!";

        } else {

            // Encrypt password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $stmt = $conn->prepare(
                "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
            );

            $stmt->bind_param(
                "sss",
                $fullname,
                $email,
                $hashed_password
            );
            if ($stmt->execute()) {

                header("Location: index.php");
                exit();

            } else {

                $message = "Something went wrong!";

            }

                $stmt->close();
        }

        $check->close();
    }
}
?>

<?php
include 'include/header.php';
?>

    <div class="container mt-5 mb-5">
        <div class="row shadow rounded overflow-hidden">

            <!-- Left Side -->
            <div class="col-md-6 p-0 position-relative">

            <img src="images/bg_6.jpg"
            class="img-fluid h-100 w-100"
            style="object-fit:cover;min-height:650px;">

            <div class="image-overlay"></div>

            <div class="welcome-text">
            <p class="small-title" style="white-space: nowrap;">
                ONLINE FASHION E-COMMERCE WEBSITE
            </p>

            <h1>Welcome Back!</h1>

            <p>
                Sign in to your account and continue shopping with Sigma.
            </p>
        </div>

    </div>

            <!-- Right Side -->
            <div class="col-md-6 p-5">

                <h1 class="mb-2 font-weight-bold">Create Account</h1>

                <p class="text-muted mb-4">
                    Enter your information to create your account
                </p>
                <?php if (!empty($message)): ?>
                <div class="alert alert-info">
                <?php echo $message; ?>
                </div>
                <?php endif; ?>

            <form method="POST">

        <div class="form-group mb-3">
            <label><b>Full Name</b></label>
            <input type="text"
                name="fullname"
                class="form-control"
                placeholder="Enter your full name"
                required>
        </div>

        <div class="form-group mb-3">
            <label><b>Email Address</b></label>
            <input type="email"
                name="email"
                class="form-control"
                placeholder="Enter your email"
                required>
        </div>

        <div class="form-group mb-3">
            <label><b>Password</b></label>
            <input type="password"
                name="password"
                class="form-control"
                placeholder="Enter your password"
                required>
        </div>

        <div class="form-group mb-4">
            <label><b>Confirm Password</b></label>
            <input type="password"
                name="confirm_password"
                class="form-control"
                placeholder="Confirm your password"
                required>
        </div>

        <button class="btn btn-success btn-lg btn-block"
                name="register">
            Create Account
        </button>

        <div class="text-center mt-4">
            Already have an account?
            <a href="login.php">
                Sign In
            </a>
        </div>

    </form>

            </div>

        </div>
    </div>
    <?php include 'include/scripts.php'; ?>