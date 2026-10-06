<?php
@ob_start();
@session_start();
include 'config.php';

if (isset($_SESSION["superid"])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $encrypted = md5($password);

    $result = mysqli_query($link, "SELECT * FROM admin WHERE username= '$username' AND password = '$encrypted'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION["superid"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $success_message = "Login successful! Redirecting to dashboard...";

        echo "<script>
                setTimeout(function() {
                    window.location.href = 'admin-manage/dashboard.php';
                }, 1000);
              </script>";
    } else {
        $error_message = "Invalid Username and Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="admin panel">
    <meta name="Author" content="admin panel">
    <meta name="keywords" content="admin panel">

    <!-- TITLE -->
    <title>Admin</title>
    <link rel="icon" href="assets/images/bg-white-logo.png" type="image/x-icon">
    <link id="style" href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/icon-fonts/icons.css" rel="stylesheet">
    <script src="assets/js/authentication-main.js"></script>
</head>

<body class="authentication-background authenticationcover-background position-relative" id="particles-js">

    <div class="container">
        <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">

                <div class="card custom-card my-4 border z-3 position-relative">
                    <div class="card-body p-0">
                        <div class="p-3">
                            <div class="mb-3 d-flex justify-content-center auth-logo">
                            <a href="index.php">
                                <img src="assets/images/logo.png" alt="logo" style="height: 80px; border-radius: 10px; background-color: white;" class="desktop-dark">
                            </a>
                        </div>
                            <form action="" method="post">
                                <?php
                                if (isset($error_message)) {
                                    echo "<div class='alert alert-danger text-center'>$error_message</div>";
                                }

                                if (isset($success_message)) {
                                    echo "<div class='alert alert-success text-center'>$success_message</div>";
                                }
                                ?>

                                <p class="h4 fw-semibold mb-0 text-center">Sign In</p>
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signup-firstname" class="form-label text-default">User Name</label>
                                        <div class="position-relative">
                                            <input type="email" name="username" class="form-control form-control-lg"
                                                placeholder="Enter User Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-2">
                                        <label for="signin-password" class="form-label text-default d-block">Password

                                        </label>
                                        <div class="position-relative">
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                placeholder="Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/particles.js/particles.js"></script>
    <script src="assets/js/basic-password.js"></script>
    <script src="assets/js/show-password.js"></script>
    <!-- END SCRIPTS -->

</body>

</html>
