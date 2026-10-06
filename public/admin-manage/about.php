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
                <h1 class="page-title fw-medium fs-18 mb-2">About us</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About us</li>
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
                    $short_about = mysqli_real_escape_string($link, $_POST['short_about']);
                    $long_about = mysqli_real_escape_string($link, $_POST['long_about']);

                    // Check if a record already exists
                    $check_query = "SELECT COUNT(*) AS count FROM about";
                    $check_result = mysqli_query($link, $check_query);
                    $check_row = mysqli_fetch_assoc($check_result);

                    if ($check_row['count'] > 0) {
                        echo '<div class="alert alert-danger fade-in" role="alert">Only one record allowed. Please update the existing record.</div>';
                    } else {
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
                        $query = "INSERT INTO about (title, image, short_about, long_about) VALUES ('$title', '$image_path', '$short_about', '$long_about')";
                        $result = mysqli_query($link, $query);

                        if ($result) {
                            echo '<div class="alert alert-success fade-in" role="alert">Added successfully.</div>';
                        } else {
                            echo '<div class="alert alert-danger fade-in" role="alert">Try again.</div>';
                        }
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
                        <div class="card-title">Add About us</div>
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
                                    <textarea type="text" class="form-control" name="short_about"
                                        placeholder="Short about" rows="5" required></textarea>
                                </div>
                                <div class="col-xl-12">
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" id="summernote" name="long_about"
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
        <!--End::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM about ORDER BY id DESC";
                                    $result = mysqli_query($link, $query);
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $i++;
                                        ?>
                                        <tr class="product-list">
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= $i; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <img src="Uploads/<?= $row['image']; ?>" style="height: 70px;"
                                                            alt="about image">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <?= $row['title']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="edit-about.php?id=<?= $row['id']; ?>"
                                                        class="btn btn-icon btn-sm btn-primary-light editBtn">
                                                        <i class="ri-edit-line"></i>
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['id'] ?>">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>


                                                    <!-- Edit Category Modal -->
                                                    <div class="modal fade" id="formmodal<?= $row['id'] ?>" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Edit Category</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form enctype="multipart/form-data" action=""
                                                                        method="post">
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $row['id'] ?>">

                                                                        <div class="mb-3">
                                                                            <label class="col-form-label">Category
                                                                                Name:</label>
                                                                            <input type="text" name="category_name"
                                                                                class="form-control"
                                                                                value="<?= $row['category_name']; ?>">
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="UpdateCategory"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Category Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Delete Category</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <form action="" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this category?
                                                                        </p>
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $row['id'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit" name="DeleteCategory"
                                                                            class="btn btn-primary">Delete</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>


                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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