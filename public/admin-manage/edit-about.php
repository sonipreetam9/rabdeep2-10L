<?php

include 'header-top.php';

$id = $_GET['id'];
$sel = mysqli_query($link, "SELECT * FROM about WHERE id='$id'");
$dataq = mysqli_fetch_array($sel);
?>
<!-- END SIDEBAR -->

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Start::page-header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Update About us</h1>
                <ol class="breadcrumb mb-0">

                    <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update About us</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">


                <?php
                if (isset($_POST["Update"])) {

                    $title = mysqli_real_escape_string($link, $_POST['title']);
                    $short_about = mysqli_real_escape_string($link, $_POST['short_about']);
                    $long_about = mysqli_real_escape_string($link, $_POST['long_about']);

                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];

                    // Default: keep old image
                    $image_path = $dataq['image'];

                    // If new image uploaded
                    if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

                        $imageno = $_FILES['image']['name'];
                        $extension = strtolower(pathinfo($imageno, PATHINFO_EXTENSION));

                        if (in_array($extension, $allowed_extensions)) {

                            $ran = rand(100000, 9999999);
                            $imagename = $ran . '.' . $extension;
                            $target = "Uploads/" . $imagename;

                            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

                                // Optional: delete old image
                                if (!empty($dataq['image']) && file_exists("Uploads/" . $dataq['image'])) {
                                    unlink("Uploads/" . $dataq['image']);
                                }

                                $image_path = $imagename;
                            }
                        } else {
                            echo '<div class="alert alert-danger">Invalid image format.</div>';
                            exit;
                        }
                    }

                    // UPDATE QUERY
                    $update = mysqli_query(
                        $link,
                        "UPDATE about SET 
            title='$title',
            image='$image_path',
            short_about='$short_about',
            long_about='$long_about'
         WHERE id='$id'"
                    );

                    if ($update) {
                        echo '<div class="alert alert-success fade-in">Updated successfully.</div>';
                    } else {
                        echo '<div class="alert alert-danger fade-in">Update failed.</div>';
                    }
                }
                ?>



                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Update About us</div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="<?= $dataq['title'] ?>">
                                </div>
                                <div class="col-xl-10">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image"
                                        accept="image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this, 'preview1')">
                                </div>
                                <div class="col-xl-2">
                                    <label class="form-label"> </label>
                                    <img id="preview1" src="Uploads/<?= $dataq['image'] ?>" width="100%" height="150px"
                                        style="object-fit:contain" alt="">
                                </div>
                                <div class="col-xl-12">
                                    <label for="title" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_about" rows="5"
                                        required><?= $dataq['short_about'] ?></textarea>
                                </div>
                                <div class="col-xl-12">
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" id="summernote" name="long_about"
                                        required><?= $dataq['long_about'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-list text-start">
                                <button type="submit" name="Update" class="btn btn-md btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MAIN-CONTENT -->


<!-- FOOTER -->

<?php

include 'footer.php';

?>
<script>
    function previewImage(input, imgPreviewId) {
        const file = input.files[0];
        const preview = document.getElementById(imgPreviewId);

        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    }
</script>