<?php

include 'include/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$message = "";

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
$password = $_POST['password'];

if (strlen($password) < 8 || strlen($password) > 25) {

    $message = "Password must be between 8 and 25 characters long.";

} else {

    $stmt = $conn->prepare(
        "SELECT id, name, email, password FROM users WHERE email = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: index.php");
            exit();

        } else {

            $message = "Incorrect password!";

        }

    } else {

        $message = "This email is not registered!";

    }

    $stmt->close();
}

}

?>

<?php include 'include/header.php'; ?>

<div class="container mt-5 mb-5">

    <div class="row shadow rounded overflow-hidden">


        <div class="col-md-6 p-0 position-relative">

            <img src="images/bg_6.jpg"
                 class="img-fluid h-100 w-100"
                 style="object-fit:cover; min-height:650px;">

            <div class="image-overlay"></div>

            <div class="welcome-text">

                <p class="small-title"
                   style="white-space: nowrap;">

                    ONLINE FASHION E-COMMERCE WEBSITE

                </p>

                <h1>
                    Welcome Back!
                </h1>

                <p>

                    Sign in to your account and continue
                    shopping with Winkel.

                </p>

            </div>

        </div>



        <div class="col-md-6 p-5">

            <h1 class="mb-2 font-weight-bold">
                Sign In
            </h1>

            <p class="text-muted mb-4">

                Enter your account details to continue shopping

            </p>


            <?php if (!empty($message)): ?>

                <div class="alert alert-danger">

                    <?php echo $message; ?>

                </div>

            <?php endif; ?>



            <form method="POST">



                <div class="form-group mb-3">

                    <label>
                        <b>Email Address</b>
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email"
                        required
                    >

                </div>



                <div class="form-group mb-3">

                    <label>
                        <b>Password</b>
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <div class="d-flex justify-content-between mb-4">

                    <label>

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        Remember Me

                    </label>


                    <a href="forgot-password.php">

                        Forgot Password?

                    </a>

                </div>



                <button
                    type="submit"
                    name="login"
                    class="btn btn-success btn-lg btn-block"
                >

                    Sign In

                </button>


                <div class="text-center mt-4">

                    Don't have an account?

                    <a href="register.php">

                        Create an Account

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>


<?php include 'include/scripts.php'; ?>

</body>

</html>