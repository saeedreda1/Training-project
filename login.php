<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online Fashion E-Commerce Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="styyle.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-reboot.css">
  </head>
<!-- Left Side -->
<section class="auth-page">

    <div class="container">

        <div class="row auth-box">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 auth-left-panel">

                <div class="auth-dark-layer">

                    <span class="auth-small-title">
                        ONLINE FASHION E-COMMERCE WEBSITE
                    </span>

                    <h1 class="auth-main-title">
                        Welcome Back!
                    </h1>

                    <p class="auth-description">
                        Sign in to your account and continue shopping with Winkel.
                    </p>

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6 auth-right-panel">

                <div class="auth-heading">

                    <h2>Sign In</h2>

                    <p>
                        Enter your account details to continue
                    </p>

                </div>

                <?php echo $message ?? ''; ?>

                <form method="POST" class="auth-login-form">

                    <div class="auth-input-group">

                        <label>Email Address</label>

                        <input
                            type="email"
                            name="email"
                            class="auth-input"
                            placeholder="Enter your email"
                            required>

                    </div>

                    <div class="auth-input-group">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="auth-input"
                            placeholder="Enter your password"
                            required>

                    </div>

                    <div class="auth-extra">

                        <label class="auth-check">
                            <input type="checkbox">
                            Remember Me
                        </label>

                        <a href="forgot-password.php">
                            Forgot Password?
                        </a>

                    </div>

                    <button
                        type="submit"
                        name="login"
                        class="auth-submit-btn">

                        Login

                    </button>

                </form>

                <div class="auth-register">

                    Don't have an account?

                    <a href="register.php">
                        Create an Account
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>
<?php include 'include/scripts.php'; ?>