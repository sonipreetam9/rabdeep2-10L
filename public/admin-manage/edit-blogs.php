<?php

include 'header-top.php';

$id = $_GET['id'];
$sel = mysqli_query($link, "SELECT * FROM blogs WHERE id='$id'");
$dataq = mysqli_fetch_array($sel);

?>
<!-- END SIDEBAR -->

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Start::page-header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Edit Blog</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">


                <?php
                // Update Blog Code
                if (isset($_POST['submit'])) {
                
                    $title = mysqli_real_escape_string($link, $_POST['title']);
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
                    $short_description = mysqli_real_escape_string($link, $_POST['short_description']);
                    $long_description = mysqli_real_escape_string($link, $_POST['long_description']);

                    // Fetch old image
                    $oldImgQuery = mysqli_query($link, "SELECT image FROM blogs WHERE id='$id'");
                    $oldImgData = mysqli_fetch_assoc($oldImgQuery);
                    $old_image = $oldImgData['image'];

                    $image_name = $old_image; // default old image
                
                    // Allowed image formats
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];

                    // Image upload
                    if (!empty($_FILES['image']['name'])) {

                        $image = $_FILES['image']['name'];
                        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

                        if (in_array($ext, $allowed_extensions)) {

                            $new_image = rand(100000, 999999) . '.' . $ext;
                            $target = "Uploads/" . $new_image;

                            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                                $image_name = $new_image;

                                // Delete old image
                                if (!empty($old_image) && file_exists("Uploads/" . $old_image)) {
                                    unlink("Uploads/" . $old_image);
                                }
                            }

                        } else {
                            echo '<div class="alert alert-danger">Invalid image format</div>';
                            exit;
                        }
                    }

                    // Update query
                    $update = "UPDATE blogs SET 
                        title='$title',
                        slug='$slug',
                        image='$image_name',
                        short_description='$short_description',
                        long_description='$long_description'
                    WHERE id='$id'";

                    if (mysqli_query($link, $update)) {
                        echo '<div class="alert alert-success fade-in">Blog Updated Successfully</div>';
                    } else {
                        echo '<div class="alert alert-danger fade-in">Update Failed</div>';
                    }
                }
                ?>



                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Edit Blog</div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="hidden" name="id" value="<?= $dataq['id'] ?>">
                                    <input type="text" class="form-control" name="title" placeholder="Title"
                                        value="<?= $dataq['title'] ?>">
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
                                    <textarea type="text" class="form-control" name="short_description"
                                        placeholder="Short description"
                                        rows="5"><?= $dataq['short_description'] ?></textarea>
                                </div>
                                <div class="col-xl-12">
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" id="summernote"
                                        name="long_description"><?= $dataq['long_description'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-list text-start">
                                <button type="submit" name="submit" class="btn btn-md btn-primary">Submit</button>
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