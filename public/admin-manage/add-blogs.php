<?php

include 'header-top.php';

?>
<!-- END SIDEBAR -->

<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Start::page-header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">Add New Blog</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Blog</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">


                <?php

                // Add New About us Code
                if (isset($_POST["submit"])) {
                    $title = mysqli_real_escape_string($link, $_POST['title']);
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
                    $short_description = mysqli_real_escape_string($link, $_POST['short_description']);
                    $long_description = mysqli_real_escape_string($link, $_POST['long_description']);
             

                    // Check if a record already exists
                    $check_query = "SELECT COUNT(*) AS count FROM blogs";
                    $check_result = mysqli_query($link, $check_query);
                    $check_row = mysqli_fetch_assoc($check_result);


                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
                    $image_path = null;

                    // Handle single file upload
                    if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $imageno = $_FILES['image']['name'];
                        $extension = strtolower(pathinfo($imageno, PATHINFO_EXTENSION));

                        if (in_array($extension, $allowed_extensions)) {
                            $ran = rand(9999999, 99999999999);
                            $imagename = $ran . '.' . $extension;
                            $source = $_FILES['image']['tmp_name'];
                            $target = "Uploads/" . $imagename;
                            move_uploaded_file($source, $target);
                            $image_path = $imagename;

                        } else {
                            echo '<div class="alert alert-danger fade-in" role="alert">Invalid image format. Allowed formats are .jpg, .jpeg, .png, .webp.</div>';
                            exit;
                        }
                    }

                    // Insert data into the database
                    $query = "INSERT INTO blogs (title, slug, image, short_description, long_description) VALUES ('$title', '$slug', '$image_path', '$short_description', '$long_description')";
                    $result = mysqli_query($link, $query);

                    if ($result) {
                        echo '<div class="alert alert-success fade-in" role="alert">Blog Added successfully.</div>';
                    } else {
                        echo '<div class="alert alert-danger fade-in" role="alert">Try again.</div>';
                    }
                }


                // Delete Category Code
                if (isset($_POST["DeleteCategory"])) {

                    $id = $_POST["id"];
                    // Correct delete query
                    $delete_query = "DELETE FROM about WHERE id = '$id'";
                    if (mysqli_query($link, $delete_query)) {
                        echo "<div class='alert alert-success fade-in'>Category Deleted Successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                    }

                }



                ?>


                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Add New Blog</div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" required>
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
                                        placeholder="Short description" rows="5" required></textarea>
                                </div>
                                <div class="col-xl-12">
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" id="summernote" name="long_description"
                                        required></textarea>
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