<?php

include 'header-top.php';

$message = "";

// Fetch previous admin data
$adminQuery = mysqli_query($link, "SELECT * FROM admin WHERE id = 1");
$adminData = mysqli_fetch_assoc($adminQuery);
$oldUsername = $adminData['username'];
$oldPassword = $adminData['password'];

if (isset($_POST['updatePassword'])) {

    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);


    if (!empty($password)) {
        $md5Password = md5($password);
    } else {
        $md5Password = $oldPassword;
    }

    $update = "
        UPDATE admin 
        SET username = '$username', password = '$md5Password'
        WHERE id = 1
    ";

    if (mysqli_query($link, $update)) {
        $message = "<div class='alert alert-success fade-in'>Username & Password Updated Successfully.</div>";
    } else {
        $message = "<div class='alert alert-danger fade-in'>Error updating data.</div>";
    }
}
?>

<div class="main-content app-content">
    <div class="container-fluid">

        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Update Admin Password</h1>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Main</a></li>
                        <li class="breadcrumb-item active">Update Admin Password</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">

                <?php if (!empty($message)) echo $message; ?>

                <div class="card custom-card">
                    <div class="p-3 border-bottom border-top border-block-end-dashed tab-content">

                        <form action="" method="POST">

                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username"
                                           value="<?= $oldUsername ?>" required>
                                </div>

                                <div class="col-xl-12">
                                    <label class="form-label">New Password</label>
                                    <input type="text" class="form-control" name="password"
                                           placeholder="Enter new password (leave blank to keep old)">
                                </div>
                            </div>

                            <div class="card-footer border-top-0">
                                <button type="submit" name="updatePassword" class="btn btn-primary">
                                    Update
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php 

include 'footer.php'; 

?>
