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
                <h1 class="page-title fw-medium fs-18 mb-2">Add Gallery Image</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Gallery Image</li>
                </ol>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">


                <?php

                // Simple image upload + save in database
                if (isset($_POST['submit'])) {

                    if (!empty($_FILES['image']['name'])) {

                        $image = $_FILES['image']['name'];
                        $tmp = $_FILES['image']['tmp_name'];

                        $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
                        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

                        if (in_array($ext, $allowed_ext)) {

                            // unique image name
                            $new_image_name = time() . '-' . $image;

                            $upload_dir = 'Uploads/';
                            $target_file = $upload_dir . $new_image_name;

                            if (move_uploaded_file($tmp, $target_file)) {

                                // insert image name into database
                                $insert = mysqli_query(
                                    $link,
                                    "INSERT INTO gallery (image) VALUES ('$new_image_name')"
                                );

                                if ($insert) {
                                    echo "<div class='alert alert-success fade-in'>Image Uploaded & Saved Successfully.</div>";
                                } else {
                                    echo "<div class='alert alert-danger fade-in'>Database insert failed.</div>";
                                }

                            } else {
                                echo "<div class='alert alert-danger'>Image upload failed.</div>";
                            }

                        } else {
                            echo "<div class='alert alert-danger'>
                    Invalid file type. Only JPG, JPEG, PNG, WEBP allowed.
                  </div>";
                        }

                    } else {
                        echo "<div class='alert alert-danger'>Please select an image.</div>";
                    }
                }


                // Delete Image Code
                if (isset($_POST["DeleteImage"])) {

                    $image_id = $_POST["id"];
                    // Correct delete query
                    $delete_query = "DELETE FROM gallery WHERE id = '$image_id'";
                    if (mysqli_query($link, $delete_query)) {
                        echo "<div class='alert alert-success fade-in'>Image Deleted Successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger fade-in'>Database Error: " . mysqli_error($link) . "</div>";
                    }

                }



                ?>


                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Add New Image</div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-10">
                                    <label for="blog-title" class="form-label">Add Image</label>
                                    <input type="file" class="form-control" name="image"
                                        accept="image/jpeg,image/png,image/webp"
                                        onchange="previewImage(this, 'preview1')">
                                </div>
                                <div class="col-xl-2">
                                    <img id="preview1" src="Uploads/<?= $dataq['image'] ?>" width="100%" height="200px"
                                        style="object-fit:contain" alt="image">
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
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM gallery ORDER BY id DESC";
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
                                                        <img src="Uploads/<?= $row['image'] ?>" alt="image"
                                                            width="100px" height="100px"
                                                            style="object-fit:contain">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <!-- <button type="button"
                                                        class="btn btn-icon btn-sm btn-primary-light editBtn"
                                                        data-id="<?= $row['id'] ?>" data-bs-toggle="modal"
                                                        data-bs-target="#formmodal<?= $row['id'] ?>">
                                                        <i class="ri-edit-line"></i>
                                                    </button> -->

                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['id'] ?>">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                    <!-- <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm btn-danger-light product-btn"><i
                                                            class="ri-delete-bin-line"></i></a> -->


                                                    <!-- Edit Image Modal -->
                                                    <!-- <div class="modal fade" id="formmodal<?= $row['category_id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
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
                                                                        <input type="hidden" name="category_id"
                                                                            value="<?= $row['category_id'] ?>">

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
                                                    </div> -->

                                                    <!-- Delete Category Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Delete Category</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <form action="" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this Image?
                                                                        </p>
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $row['id'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit" name="DeleteImage"
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

<script>
    function previewImage(input, imgPreviewId) {
        const file = input.files[0];
        const preview = document.getElementById(imgPreviewId);

        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    }
</script>

<?php

include 'footer.php';

?>